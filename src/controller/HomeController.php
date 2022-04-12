<?php

namespace app\controller;

use app\model\Database;

/**
 *
 */
class HomeController extends AbstractController
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
    public function displayPage()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        // die();

        echo $this->render('home/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],

            'headerSectionItems' => (new Database())->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'header'"]),
            'showMenuItems' => (new Database())->viewMenuItems(["*"], [" WHERE","categoryTitle", "=", "'Main Dishes'"]),

            'hoursSectionItems' => (new Database())->viewItem("homepage_item", ["text1"], [" WHERE", "section", "=", "'hours-main'"]),

            'thisYear' => Date("Y"),
        ]);
    }

    /**
     * @return void
     */
    public function contactFormTreatment()
    {
        if($_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !== ""){
            //data for admin
            $clientName=$_POST['name'];
            $clientEmail=$_POST['email'];
            $clientPhone=$_POST['phone'];
            $clientSubject=$_POST['subject'];
            $clientMessage=$_POST['message'];
            date_default_timezone_set('Europe/Paris');
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
            $add = (new Database())->addItem("contact_form", ["name", "email", "phone", "subject", "message", "createdAt"], [$clientName, $clientEmail, $clientPhone, $clientSubject, $clientMessage, $clientDatetime]);
            if ($add){
                echo "<h3>Thanks, we have received your message!controller</h3>";
            } else {
                echo "Cannot send form to server ".$add;
            }
        }

    }
}