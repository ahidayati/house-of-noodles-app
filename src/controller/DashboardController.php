<?php
namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class DashboardController {
    public function displayDashboard()
    {

        $loader = new FilesystemLoader('./templates');
        $twig = new Environment($loader);
        echo $twig->render('admin/dashboard.html.twig', [

        ]);
    }
}