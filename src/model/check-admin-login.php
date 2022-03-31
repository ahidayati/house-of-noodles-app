<?php
use app\model\Database;
require_once '../../src/model/Database.php';

//to get hashed password
//echo password_hash("test", PASSWORD_DEFAULT);

if($_POST['username'] !== "" && $_POST['password'] !== ""){
    $user = $_POST['username'];
    $pass = $_POST['password'];


    $validityCheck = (new Database())->viewItem("user", ["username", "password"], ["username", "=", "'".$user."'"]);

    if ($validityCheck == true && password_verify($pass, $validityCheck['password'])){
    //if($validityCheck['username'] === $user && $validityCheck['password'] === $pass){

        session_start();
        $_SESSION['use']=$user;

        echo "Success";
    }else{
        echo "Invalid Username and/or Password.";
    }

} else {
    echo "Empty Username and/or Password.";
}