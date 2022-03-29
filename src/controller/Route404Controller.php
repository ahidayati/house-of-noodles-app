<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Route404Controller {

    public function display404()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('404/index.html.twig', [

        ]);
    }
}