<?php

//echo "test";

//var_dump($_ENV);
//pdo connection test
//try{
//    //$connect = new PDO("mysql:host=mariadb;port=3306;dbname=database", "user", "zeus");
//    $connect = new PDO("mysql:host=".$_ENV["MYSQL_HOST"].";port=3306;dbname=".$_ENV["MYSQL_DATABASE"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
//    $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    echo "Connected succesfully <br>";
//} catch(PDOException $e){
//    echo "Connection failed: " . $e -> getMessage();
//}
//
//
//$query = "SELECT * FROM table1;";
//$results = $connect->query($query);
//$results->execute();
//
//$rows = $results->fetchAll(PDO::FETCH_ASSOC);
//
//var_dump($rows);

use app\controller\HomeController;
use Bramus\Router\Router as Bramus;

require 'vendor/autoload.php';
//require 'src/controller/HomeController.php';
//require 'vendor/bramus/router/src/Bramus/Router/Router.php';

//$home = new HomeController();
//$home->display();

//if (empty($_GET['page'])) {
//    (new HomeController())();
//} else {
//    echo "page not found";
//}

// Create a Router
$router = new Bramus();

// Define Routes
$router->get('/', function () {
    (new HomeController())->displayPage();
});

// Run router
$router->run();

?>


