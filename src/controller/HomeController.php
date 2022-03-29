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
//        var_dump($_SERVER['REQUEST_URI']);
//        die();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('home/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],

            'headerSectionItems' => (new Database())->viewItem("homepage_item", ["heading", "subheading"], ["section", "=", "'header'"]),
            'showMenuItems' => (new Database())->viewMenu(["menuCategoryTitle", "=", "'Main Dishes'"]),

            'thisYear' => Date("Y"),
        ]);
    }
}