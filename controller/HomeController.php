<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class HomeController
{
    public function display(){
        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('home/index.html.twig', [
        ]);
    }
}