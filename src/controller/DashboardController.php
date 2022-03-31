<?php
namespace app\controller;

use app\model\Database;
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
            'headerSectionItems' => (new Database())->viewItem("homepage_item", ["heading", "subheading", "updatedAt"], ["section", "=", "'header'"]),
        ]);
    }
}