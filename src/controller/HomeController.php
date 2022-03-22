<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    public function displayPage()
    {
        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('home/index.html.twig', [
        ]);
    }
}