<?php
namespace app\controller;

use app\model\Database;

/**
 *
 */
class DashboardController extends AbstractController
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
     */
    public function displayDashboardHome()
    {
        //$now = new \DateTime();
        //var_dump($now->format("Y-m-d H:i:s"));
        //die();

        //condition for session timeout
        if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {

            (new Database())->updateItem("user", ["lastLogin"], [(new \DateTime())->format('Y-m-d H:i:s')], ["id", "=", $_SESSION['userId']]);

            session_unset();
            session_destroy();
            //echo "session destroyed";
        }
        $_SESSION['start'] = time();

        $db = new Database();
        echo $this->render('admin/dashboard-home.html.twig', [
            'headerSection' => (new Database())->viewItem("homepage_item", ["text1", "text2", "updatedAt"], [" WHERE","section", "=", "'header'"]),

            'hoursSectionMain' => $db->viewItem("homepage_item", ["text1"], [" WHERE", "section", "=", "'hours-main'"]),
            'hoursSection1' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'hours-1'"]),
            'hoursSection2' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'hours-2'"]),

            'testimonialSection' => $db->viewItem("homepage_item", ["text2", "text3", "updatedAt"], [" WHERE", "section", "=", "'testimonial'"]),

            'valuesMainSection' => $db->viewItem("homepage_item", ["text1", "text2", "updatedAt"], [" WHERE", "section", "=", "'card-main'"]),
            'valuesSection1' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-1'"]),
            'valuesSection2' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-2'"]),
            'valuesSection3' => $db->viewItem("homepage_item", ["text1", "text2"], [" WHERE", "section", "=", "'card-3'"]),
        ]);
    }

    /**
     * @return void
     */
    public function displayDashboardMenu()
    {
        echo $this->render('admin/dashboard-menu.html.twig', [
            'viewMenuItems' => (new Database())->viewMenuItems(["menu.id", "menu.menuItem", "menu.menuDescription", "menu.price", "menu.createdAt", "menu.updatedAt"]),
//            'viewMenuItemCategories' => (new Database())->viewMenuItems(["category.categoryTitle"], [" WHERE", "menu.id", "="]),
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function displayDashboardMenuEdit($id)
    {
//        var_dump((new Database())->viewMenuItems(["category.categoryTitle"], [" WHERE", " menu.id", " =", $id]));
//        die();

        echo $this->render('admin/dashboard-menu-edit.html.twig', [
            'viewMenuItem' => (new Database())->viewMenuItem(["menu.id", "menu.menuItem", "menu.menuDescription", "menu.price", "menu.createdAt", "menu.updatedAt"], [" WHERE", " menu.id", " =", $id]),
            'viewAllCategories' => (new Database())->viewItems("category", ["id", "categoryTitle"]),
            'viewMenuItemCategories' => (new Database())->viewMenuItems(["category.categoryTitle"], [" WHERE", " menu.id", " =", $id]),
        ]);
    }

    /**
     * @return void
     */
    public function displayDashboardMenuAdd()
    {

        echo $this->render('admin/dashboard-menu-add.html.twig', [
            'viewAllCategories' => (new Database())->viewItems("category", ["id", "categoryTitle"]),
        ]);
    }


    /**
     * @return void
     */
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

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function displayDashboardMessage()
    {
        echo $this->render('admin/dashboard-message.html.twig', [
            'viewMessages' => (new Database())->viewItems("contact_form", ["id", "name", "email", "phone", "subject", "message", "createdAt"]),
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteMessage($id)
    {
        try {
            $db = new Database();
            $db->deleteItem("contact_form", ["id"], [$id]);

            header('location: /dashboard/message');
        }catch (Exception $e){
            echo "<div class='text-center fs-3 mt-5'>Cannot delete item.</div>".$e;
        }
    }

    /**
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function displayDashboardReservation()
    {
        echo $this->render('admin/dashboard-reservation.html.twig', [
            'viewReservationList' => (new Database())->viewReservations(["reservation_form.id AS idForm", "reservation_form.name", "reservation_form.email", "reservation_form.phone", "reservation_form.person", "reservation_form.date", "reservation_form.hour", "reservation_form.createdAt", "reservation_status.id AS idStatusDetail", "reservation_status.status"]),

            'viewAllStatus' => (new Database())->viewItems("reservation_status", ["id", "status"]),
        ]);
    }

    public function updateReservation()
    {
        if ($_POST['statusId'] !== "") {
            $statusId = $_POST['statusId'];
            $reserveId = $_POST['reserveId'];

            //update to database
            $update = (new Database())->updateItem("reservation_form", ["idStatus"], [$statusId], ["id", "=", $reserveId]);

            if ($update) {
                echo "<span class='bg-light text-black'>Data is updated. <i class='fa-solid fa-thumbs-up'></i></span>";
            } else {
                echo "<span class='bg-danger text-light'>Cannot update data in server</span> " . $update;
            }

        } else {
            echo "<span class='bg-danger text-light'>Empty field(s).</span>";
        }
    }

    public function deleteReservation($id)
    {
        try {
            $db = new Database();
            $db->deleteItem("reservation_form", ["id"], [$id]);

            header('location: /dashboard/reservation');
        } catch (Exception $e) {
            echo "<div class='text-center fs-3 mt-5'>Cannot delete item.</div>" . $e;
        }
    }

    public function displayDashboardUser($id)
    {
        echo $this->render('admin/dashboard-user.html.twig', [
            'userData' => (new Database())->viewItem("user", ["username", "firstName", "lastName", "email"], ["WHERE", "id", "=", $id]),
        ]);
    }

    /**
     * @return void
     */
    public function displayDashboardUserAdd()
    {
        echo $this->render('admin/dashboard-user-add.html.twig', [

        ]);
    }

    /**
     * @return void
     */
    public function displayDashboardUserChangePassword()
    {
        echo $this->render('admin/dashboard-user-password-change.html.twig', [

        ]);
    }

    public function updateUser()
    {
        if ($_POST['username'] !== "" && $_POST['firstName'] !== "" && $_POST['lastName'] !== "" && $_POST['email'] !== "" && $_POST['userId'] !== "") {
            $username = $_POST['username'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $userId = $_POST['userId'];

            //update to database
            $update = (new Database())->updateItem("user", ["username", "firstName", "lastName", "email"], [$username, $firstName, $lastName, $email], ["id", "=", $userId]);

            if ($update) {
                echo "<span class='bg-light text-black'>Data successfully updated. <i class='fa-solid fa-thumbs-up'></i></span>";
            } else {
                echo "<span class='bg-danger text-light'>Cannot update data in server.</span> " . $update;
            }

        } else {
            echo "<span class='bg-danger text-light'>Empty field(s).</span>";
        }
    }

}