<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PrivacyPolicyController {
    public function displayPP()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('privacy_policy/index.html.twig', [

        ]);
    }
}