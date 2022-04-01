<?php
use app\model\Database;
require_once '../../src/model/Database.php';

$result = false;
if($_POST['headerHeading'] !== "" && $_POST['headerSubheading'] !== ""){
    $headerHeading = $_POST['headerHeading'];
    $headerSubheading = $_POST['headerSubheading'];
    $updateTime = (new \DateTime())->format('Y-m-d H:i:s');

    //update to database
    (new Database())->updateItem("homepage_item", ["heading", "subheading", "updatedAt"], [$headerHeading, $headerSubheading, $updateTime], ["section", " = ", "'header'"]);
    $result = true;
} else {
    echo "<span class='bg-danger text-light'>Empty field(s).</span>";
}

if($result == true){
    echo"<span class='bg-light text-black'>Data successfully updated. <i class='fa-solid fa-thumbs-up'></i></span>";
}