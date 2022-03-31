<?php
use app\model\Database;
require_once '../../src/model/Database.php';

//var_dump($_POST);

$result=false;

if($_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !== ""){
    //data for admin
    $clientName=$_POST['name'];
    $clientEmail=$_POST['email'];
    $clientPhone=$_POST['phone'];
    $clientSubject=$_POST['subject'];
    $clientMessage=$_POST['message'];
    $clientDatetime = (new \DateTime())->format('Y-m-d H:i:s');

    //email for admin
    $adminEmail="hidayati.ann@gmail.com";
    $AdminEmailBody = "Client Name: " . $clientName . "\n" . "Phone Number: " . $clientPhone . "\n\n" . "Client Message: " . "\n" . $clientMessage;
    $headerToAdmin = "From: " . $clientEmail;
    $sendMailToAdmin = mail($adminEmail, $clientSubject, $clientMessage, $headerToAdmin);

    //email for client
    $subjectToClient = "Automatic reply: Message was submitted successfully | The House of Noodles";
    $replyToClient = "Dear" . $clientName . "\n"
        . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
        . "You submitted the following message: " . "\n" . $clientMessage . "\n\n"
        . "Regards," . "\n" . "- The House of Noodles";
    $headerToClient = "From: " . $adminEmail;
    $sendMailToClient = mail($clientEmail, $subjectToClient, $replyToClient, $headerToClient);

    //input to database
    (new Database())->add("contact_form", ["name", "email", "phone", "subject", "message", "createdAt"], [$clientName, $clientEmail, $clientPhone, $clientSubject, $clientMessage, $clientDatetime]);
    $result=true;
}

if($result==true){
    echo"<h3>Thanks, we have received your message!</h3>";
}