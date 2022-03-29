<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TermsConditionsController {
    public function displayTC()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('terms_conditions/index.html.twig', [

        ]);
    }
}