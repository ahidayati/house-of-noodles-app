<?php

namespace app\controller;

use app\model\Database;

/**
 *
 */
class AdminController extends AbstractController
{

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function displayAdminLogin()
    {

        echo $this->render('admin/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],
        ]);
    }

    /**
     * @return void
     */
    public function adminLoginCheck()
    {
        //to get hashed password
        //echo password_hash("test", PASSWORD_DEFAULT);

        $status = "Fail";
        $message = "";

        if ($_POST['username'] !== "" && $_POST['password'] !== "") {
            $user = $_POST['username'];
            $pass = $_POST['password'];


            $validityCheck = (new Database())->viewItem("user", ["username", "password", "id", "lastLogin"], [" WHERE", "username", "=", "'" . $user . "'"]);

            if ($validityCheck == true && password_verify($pass, $validityCheck['password'])) {
                //if($validityCheck['username'] === $user && $validityCheck['password'] === $pass){

                $_SESSION['use'] = $user;
                $_SESSION['userId'] = $validityCheck['id'];
                $_SESSION['userLastLogin'] = $validityCheck['lastLogin'];

                $status = "OK";
            } else {
                $message = "Invalid Username and/or Password.";
            }

        } else {
            $message = "Empty Username and/or Password.";
        }

        echo json_encode([
            "status" => $status,
            "message" => $message
        ]);
    }

    /**
     * @return void
     */
    public function adminLogoutCheck()
    {
        $status = "Fail";
        $message = "";

        if ($_POST['logout'] == true) {

            (new Database())->updateItem("user", ["lastLogin"], [(new \DateTime())->format('Y-m-d H:i:s')], ["id", "=", $_SESSION['userId']]);

            $_SESSION["use"] = "";
            $_SESSION['userId'] = "";
            $_SESSION['userLastLogin'] = "";

            session_destroy();
            $status = "OK";
        } else {
            $message = "Cannot logout. Something's wrong";
        }

        echo json_encode([
            "status" => $status,
            "message" => $message
        ]);

    }
}