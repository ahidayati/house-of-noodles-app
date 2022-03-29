<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class InfoController {
    public function displayInfo()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('info/index.html.twig', [

        ]);
    }
}