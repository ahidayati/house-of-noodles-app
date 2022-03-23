<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use app\model\Home;

//include $_SERVER['DOCUMENT_ROOT']."/src/model/Home.php";
//var_dump(file_exists($_SERVER['DOCUMENT_ROOT']."/src/model/Home.php"));
//die();

class HomeController
{

//    function __construct()
//    {
//    }

    public function displayPage()
    {
        $newHome = new Home();
        $headerSection = $newHome->displayHeaderSection();
//        var_dump($headerSection);
//        die();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('home/index.html.twig', [
            'testVariable' => $headerSection,

        ]);
    }
}