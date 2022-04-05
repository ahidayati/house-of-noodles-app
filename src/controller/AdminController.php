<?php

namespace app\controller;

use app\model\Database;

class AdminController extends AbstractController
{

    function __construct()
    {
        parent::__construct();
    }

    public function displayAdminLogin()
    {

        echo $this->render('admin/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],
        ]);
    }

//    public function adminLoginCheck()
//    {
//        //to get hashed password
//        //echo password_hash("test", PASSWORD_DEFAULT);
//
//        if($_POST['username'] !== "" && $_POST['password'] !== ""){
//            $user = $_POST['username'];
//            $pass = $_POST['password'];
//
//
//            $validityCheck = (new Database())->viewItem("user", ["username", "password"], ["username", "=", "'".$user."'"]);
//
//            if ($validityCheck == true && password_verify($pass, $validityCheck['password'])){
//                //if($validityCheck['username'] === $user && $validityCheck['password'] === $pass){
//
//                session_start();
//                $_SESSION['use']=$user;
//
//                echo "Success";
//            }else{
//                echo "Invalid Username and/or Password.";
//            }
//
//        } else {
//            echo "Empty Username and/or Password.";
//        }
//    }

//    public function adminLogout()
//    {
//        if($_POST['logout'] == true){
//            session_start();
//            $_SESSION["use"] = "";
//            session_destroy();
//            echo "Logout";
//        } else {
//            echo $_POST['logout'];
//        }
//    }
}