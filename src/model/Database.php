<?php

namespace app\model;
use PDO;

class Database
{

    protected PDO $pdo;

    public function __construct()
    {
        try{
            //$pdo= new PDO("mysql:host=mariadb;port=3306;dbname=database", "user", "zeus");
            $this->pdo = new PDO("mysql:host=".$_ENV["MYSQL_HOST"].";port=3306;dbname=".$_ENV["MYSQL_DATABASE"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
            $this->pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Connected succesfully <br>";
            return $this->pdo;
        } catch(PDOException $e){
            echo "Connection failed: " . $e -> getMessage();
        }
        return $this->pdo;
    }

    public function viewItem(string $tableName, array $fieldName, array $conditions = NULL)
    {
        $fieldInString = implode(", ", $fieldName);

        $query = "SELECT ".$fieldInString." FROM ".$tableName." WHERE ".implode(" ", $conditions).";";
        $this->pdo->prepare($query);
        $results = $this->pdo->query($query);
        $results->execute();

        $row = $results->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateItem(string $tableName, array $fields, array $values, array $conditions)
    {

        $setArray = [];
        foreach ($fields as $key=>$field){
            $setArray[] = $field." = ".":value".$key;
        };

        $query = "UPDATE ".$tableName." SET ".implode(", ", $setArray)." WHERE ".implode(" ", $conditions).";";
        $results = $this->pdo->prepare($query);

        foreach ($values as $key=>$value){
            $results->bindValue(":value".$key, $value);
        };

        if ($results->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function add(string $tableName, array $fieldName, array $values)
    {
        $insertValues = [];
        foreach ($values as $key=>$value){
            $insertValues[] = ":value".$key;
        };

        $query = "INSERT INTO ".$tableName." (".implode(", ", $fieldName).") VALUES (".implode(", ", $insertValues).");";
        $results = $this->pdo->prepare($query);

            foreach ($values as $key=>$value){
                $results->bindValue(":value".$key, $value);
            };
        $results->execute();
    }

    //https://stackoverflow.com/questions/3029454/sql-query-through-an-intermediate-table
    public function viewMenu(array $conditions = null)
    {
        $query = "SELECT menuItem, menuDescription, price FROM menu JOIN menu_category ON menu_category.idMenu=menu.id JOIN category ON category.id=menu_category.idCategory"." WHERE ".implode(" ", $conditions)." ORDER BY menu.menuItemOrder;";
        $this->pdo->prepare($query);
        $results = $this->pdo->query($query);
        $results->execute();

        $rows = $results->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

}