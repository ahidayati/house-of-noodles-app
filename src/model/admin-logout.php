<?php

if($_POST['logout'] == true){
    session_start();
    $_SESSION["use"] = "";
    session_destroy();
    echo "Logout";
} else {
    echo $_POST['logout'];
}
