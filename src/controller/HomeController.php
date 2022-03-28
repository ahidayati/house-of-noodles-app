<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\model\Database;

//include $_SERVER['DOCUMENT_ROOT']."/src/model/HomeDB.php";
//var_dump(file_exists($_SERVER['DOCUMENT_ROOT']."/src/model/HomeDB.php"));
//die();

class HomeController
{

//    function __construct()
//    {
//    }

    public function displayPage()
    {
//        var_dump((new Database())->viewMenu(["menuCategoryTitle", "=", "'Main Dishes'"]));
//        die();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('home/index.html.twig', [
            'headerSectionItems' => (new Database())->view("homepage_item", ["heading", "subheading"]),
            'thisYear' => Date("Y"),
            'showMenuItems' => (new Database())->viewMenu(["menuCategoryTitle", "=", "'Main Dishes'"]),
        ]);
    }
}