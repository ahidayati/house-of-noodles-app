<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class AdminController {
    public function displayAdminLogin()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('admin/index.html.twig', [

        ]);
    }
}