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

        $db = new Database();

        // TODO: optimization
        // instead of making new Database everytime, declare the Database object in the beginning
        echo $this->render('home/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],

            'headerSection' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'header'"]),

            'menuCategories' => $db->viewItems("category", ["id", "categoryTitle", "categoryIcon"]),
            'menuItemsDefault' => $db->viewMenuItems(["*"], [" WHERE","categoryTitle", "=", "'Main Dishes'"]),

            'hoursSectionMain' => $db->viewItem("homepage_item", ["text1"], [" WHERE", "section", "=", "'hours-main'"]),
            'hoursSection1' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'hours-1'"]),
            'hoursSection2' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'hours-2'"]),

            'testimonialSection' => $db->viewItem("homepage_item", ["text2", "text3"], [" WHERE", "section", "=", "'testimonial'"]),

            'valuesMainSection' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-main'"]),
            'valuesSection1' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-1'"]),
            'valuesSection2' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-2'"]),
            'valuesSection3' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-3'"]),

            'thisYear' => Date("Y"),
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function getMenuByCategory($id)
    {
        $menuData = (new Database())->viewMenuItems(["*"], [" WHERE","category.id", "=", $id]);
        echo json_encode($menuData);
    }

    /**
     * @return void
     */
    public function contactFormTreatment()
    {
        $status = "Fail";
        $message= "";

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
            //$adminEmail="hidayati.ann@gmail.com";
            //$AdminEmailBody = "Client Name: " . $clientName . "\n" . "Phone Number: " . $clientPhone . "\n\n" . "Client Message: " . "\n" . $clientMessage;
            //$headerToAdmin = "From: " . $clientEmail;
            //$sendMailToAdmin = mail($adminEmail, $clientSubject, $clientMessage, $headerToAdmin);

            //email for client
            //$subjectToClient = "Automatic reply: Message was submitted successfully | The House of Noodles";
            //$replyToClient = "Dear" . $clientName . "\n"
            //    . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
            //    . "You submitted the following message: " . "\n" . $clientMessage . "\n\n"
            //    . "Regards," . "\n" . "- The House of Noodles";
            //$headerToClient = "From: " . $adminEmail;
            //$sendMailToClient = mail($clientEmail, $subjectToClient, $replyToClient, $headerToClient);


            if (!filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
                $message = "<span class='alert alert-danger'>Invalid email format</span>";
            } else if (!preg_match('/^[0-9]{10}+$/', $clientPhone)) {
                $message = "<span class='alert alert-danger'>Invalid phone format</span>";
            } else {
                //input to database
                $add = (new Database())->addItem("contact_form", ["name", "email", "phone", "subject", "message", "createdAt"], [$clientName, $clientEmail, $clientPhone, $clientSubject, $clientMessage, $clientDatetime]);
                if ($add){
                    // echo "<h3>Thanks, we have received your message!</h3>";
                    $status = "OK";
                } else {
                    $message = "Cannot send data to server ".$add;
                }

            }


        } else {
            $message = "<span class='alert alert-danger'>Field(s) cannot be empty</span>";
        }

        echo json_encode([
            "status" => $status,
            "message" => $message
            ]);
    }

    /**
     * @return void
     */
    public function reserveFormTreatment()
    {
        $status = "Fail";
        $message= "";

        if($_POST['name'] !== "" && $_POST['email'] !== "" && $_POST['phone'] !== "" && $_POST['person'] !== "" && $_POST['date'] !== "" && $_POST['hour'] !== ""){
            //data for admin
            $clientName=$_POST['name'];
            $clientEmail=$_POST['email'];
            $clientPhone=$_POST['phone'];
            $clientPerson=$_POST['person'];
            $clientDate=$_POST['date'];
            $clientHour=$_POST['hour'];
            date_default_timezone_set('Europe/Paris');
            $clientRequestSent = (new \DateTime())->format('Y-m-d H:i:s');


            if (!filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
                $message = "<span class='alert alert-danger'>Invalid email format</span>";
            } else if (!preg_match('/^[0-9]{10}+$/', $clientPhone)) {
                $message = "<span class='alert alert-dangert'>Invalid phone format</span>";
            } else {
                //input to database
                $add = (new Database())->addItem("reservation_form", ["name", "email", "phone", "person", "date","hour", "createdAt", "idStatus"], [$clientName, $clientEmail, $clientPhone, $clientPerson, $clientDate, $clientHour, $clientRequestSent, 1]);
                if ($add){
                    $status = "OK";
                } else {
                    $message = "Cannot send data to server ".$add;
                }

            }


        } else {
            $message = "<span class='alert alert-danger'>Field(s) cannot be empty</span>";
        }

        echo json_encode([
            "status" => $status,
            "message" => $message
        ]);
    }
}