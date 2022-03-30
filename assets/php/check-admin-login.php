<?php
use app\model\Database;
require_once '../../src/model/Database.php';

//$username = isset($_POST['username']) ? $_POST['username'] : '';
//$password = isset($_POST['password']) ? $_POST['password'] : '';
//
//$ok = true;
//$messages = "";
//
//if ( !isset($username) || empty($username) ) {
//    $ok = false;
//    $messages = 'Username cannot be empty!';
//}
//
//if ( !isset($password) || empty($password) ) {
//    $ok = false;
//    $messages = 'Password cannot be empty!';
//}
//
//if ($ok) {
//    if ($username === 'dcode' && $password === 'dcode') {
//        $ok = true;
//        $messages = 'Successful login!';
//    } else {
//        $ok = false;
//        $messages = 'Incorrect username/password combination!';
//    }
//}
//
//echo json_encode(
//    array(
//        'ok' => $ok,
//        'messages' => $messages
//    )
//);

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
//    header('Location: /dashboard');
    }else{

        echo "Invalid Username and/or Password.";
    }

} else {
    echo "Empty Username and/or Password.";
}