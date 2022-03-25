<?php
use app\model\Database;
require_once '../../src/model/Database.php';
//$response = array('success' => false);
//
//if(isset($_POST['contactName']) && $_POST['contactName']!='' && isset($_POST['contactEmail']) && $_POST['contactEmail']!='' && isset($_POST['contactPhone']) && $_POST['contactPhone']!='')
//{
//    $sql = "INSERT INTO contacts(name, phone, email) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['phone'])."', '".addslashes($_POST['email'])."')";
//
//    if($conn->query($sql))
//    {
//        $response['success'] = true;
//    }
//    var_dump($_POST);
//    $response['success'] = true;
//}



//echo json_encode($response);

//var_dump($_POST);

$result=false;
if($_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !== ""){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    (new Database())->add("contact_form", ["name", "email", "phone", "subject", "message"], $name, $email, $phone, $subject, $message);
    $result=true;
}

if($result==true){
    echo"<h3>Thanks, we have received your message!</h3>";
}