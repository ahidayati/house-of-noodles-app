<?php
namespace app\controller;

use app\model\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardController {
    public function displayDashboardHome()
    {

        session_start();

        if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 60)) {
            session_unset();
            session_destroy();
            echo "session destroyed";
        }
        $_SESSION['start'] = time();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render('admin/dashboard-home.html.twig', [
            'headerSectionItems' => (new Database())->viewItem("homepage_item", ["text1", "text2", "updatedAt"], [" WHERE","section", "=", "'header'"]),
            'hoursSectionItems' => (new Database())->viewItem("homepage_item", ["text1", "text2", "text3", "text4", "text5", "updatedAt"], [" WHERE", "section", "=", "'hours'"]),
        ]);
    }

    public function displayDashboardMenu()
    {

        session_start();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render('admin/dashboard-menu.html.twig', [
            'viewMenuItems' => (new Database())->viewMenuItems(["menu.id", "menu.menuItem", "menu.menuDescription", "menu.price", "menu.createdAt", "menu.updatedAt"]),
//            'viewMenuItemCategories' => (new Database())->viewMenuItems(["category.menuCategoryTitle"], [" WHERE", "menu.id", "="]),
        ]);
    }

    public function displayDashboardMenuEach($id)
    {

        session_start();

//        var_dump((new Database())->viewMenuItems(["category.menuCategoryTitle"], [" WHERE", " menu.id", " =", $id]));
//        die();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render('admin/dashboard-menu-edit.html.twig', [
            'viewMenuItem' => (new Database())->viewMenuItem(["menu.id", "menu.menuItem", "menu.menuDescription", "menu.price", "menu.createdAt", "menu.updatedAt"], [" WHERE", " menu.id", " =", $id]),
            'viewAllCategories' => (new Database())->viewItems("category", ["id", "menuCategoryTitle"]),
            'viewMenuItemCategories' => (new Database())->viewMenuItems(["category.menuCategoryTitle"], [" WHERE", " menu.id", " =", $id]),
        ]);
    }

    public function updateHeader()
    {
        if($_POST['headerHeading'] !== "" && $_POST['headerSubheading'] !== ""){
            $headerHeading = $_POST['headerHeading'];
            $headerSubheading = $_POST['headerSubheading'];
            $updateTime = (new \DateTime())->format('Y-m-d H:i:s');

            //update to database
            $update = (new Database())->updateItem("homepage_item", ["text1", "text2", "updatedAt"], [$headerHeading, $headerSubheading, $updateTime], ["section", " = ", "'header'"]);

            if ($update){
                echo "<span class='bg-light text-black'>Data successfully updated. <i class='fa-solid fa-thumbs-up'></i></span>";
            } else {
                echo "<span class='bg-danger text-light'>Cannot update data in server</span> ".$update;
            }

        } else {
            echo "<span class='bg-danger text-light'>Empty field(s).</span>";
        }
    }

    public function updateHours()
    {
        if($_POST['text1'] !== "" && $_POST['text2'] !== ""  && $_POST['text3'] !== "" && $_POST['text4'] !== "" && $_POST['text5'] !== ""){
            $text1 = $_POST['text1'];
            $text2 = $_POST['text2'];
            $text3 = $_POST['text3'];
            $text4 = $_POST['text4'];
            $text5 = $_POST['text5'];
            $updateTime = (new \DateTime())->format('Y-m-d H:i:s');

            //update to database
            $update = (new Database())->updateItem("homepage_item", ["text1", "text2", "text3", "text4", "text5", "updatedAt"], [$text1, $text2, $text3, $text4, $text5,$updateTime], ["section", " = ", "'hours'"]);

            if ($update){
                echo "<span class='bg-light text-black'>Data successfully updated. <i class='fa-solid fa-thumbs-up'></i></span>";
            } else {
                echo "<span class='bg-danger text-light'>Cannot update data in server.</span> ".$update;
            }

        } else {
            echo "<span class='bg-danger text-light'>Empty field(s).</span>";
        }
    }
}