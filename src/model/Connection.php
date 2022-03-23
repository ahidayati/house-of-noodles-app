<?php

class Connection
{
    public function connection()
    {
        //$pdo = new PDO('mysql:host=localhost;dbname=exam_pdo', '', '');
        //return $pdo;

        try{
            //$connect = new PDO("mysql:host=mariadb;port=3306;dbname=database", "user", "zeus");
            $connect = new PDO("mysql:host=".$_ENV["MYSQL_HOST"].";port=3306;dbname=".$_ENV["MYSQL_DATABASE"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
            $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Connected succesfully <br>";
            return $connect;
        } catch(PDOException $e){
            echo "Connection failed: " . $e -> getMessage();
        }
    }
}