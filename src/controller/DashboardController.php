<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardController {
    public function displayDashboard()
    {

        session_start();

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        echo $twig->render('admin/dashboard.html.twig', [

        ]);
    }
}