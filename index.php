<?php

//echo "test";

//pdo connection test
//try{
//    $connect = new PDO("mysql:host=mariadb;port=3306;dbname=database", "user", "zeus");
//    $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    echo "Connected succesfully <br>";
//} catch(PDOException $e){
//    echo "Connection failed: " . $e -> getMessage();
//}
//
//$query = "SELECT * FROM table1;";
//$results = $connect->query($query);
//$results->execute();
//
//$rows = $results->fetchAll(PDO::FETCH_ASSOC);
//
//var_dump($rows);

require 'vendor/autoload.php';
include 'controller/HomeController.php';

$home = new HomeController();
$home->display();


//if (empty($_GET['page'])) {
//    (new HomeController())();
//} else {
//    echo "page not found";
//}

?>


