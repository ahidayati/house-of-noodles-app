<?php

use app\model\Database;

if($_POST['logout'] == true){

    (new Database())->updateItem("user", ["lastLogin"], ["'now()"], ["id", "=", $_SESSION['userId']]);

    $_SESSION["use"] = "";
    $_SESSION['userId'] = "";
    $_SESSION['userLastLogin'] = "";

    session_destroy();
    echo "Logout";
} else {
    echo $_POST['logout'];
}
