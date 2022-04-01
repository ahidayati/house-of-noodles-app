<?php
namespace app\controller;

use app\model\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardController {
    public function displayDashboard()
    {

        session_start();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render('admin/dashboard.html.twig', [
            'headerSectionItems' => (new Database())->viewItem("homepage_item", ["heading", "subheading", "updatedAt"], ["section", "=", "'header'"]),
        ]);
    }

    public function updateHeader()
    {
        if($_POST['headerHeading'] !== "" && $_POST['headerSubheading'] !== ""){
            $headerHeading = $_POST['headerHeading'];
            $headerSubheading = $_POST['headerSubheading'];
            $updateTime = (new \DateTime())->format('Y-m-d H:i:s');

            //update to database
            $update = (new Database())->updateItem("homepage_item", ["heading", "subheading", "updatedAt"], [$headerHeading, $headerSubheading, $updateTime], ["section", " = ", "'header'"]);

            if ($update){
                echo "<span class='bg-light text-black'>Data successfully updated from controller. <i class='fa-solid fa-thumbs-up'></i></span>";
            } else {
                echo $update;
            }

        } else {
            echo "<span class='bg-danger text-light'>Empty field(s).</span>";
        }
    }
}