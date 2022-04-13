<?php

session_start();

use app\controller\HomeController;
use app\controller\Route404Controller;
use Bramus\Router\Router as Bramus;

require 'vendor/autoload.php';

//$home = new HomeController();
//$home->display();

//if (empty($_GET['page'])) {
//    (new HomeController())();
//} else {
//    echo "page not found";
//}


//whoops handler to debug php
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Create a Router
$router = new Bramus();
//var_dump($_POST);
//die();

// homepage routes
$router->get('/', function () {
    (new HomeController())->displayPage();
});
$router->get('/terms-conditions', function () {
    (new \app\controller\TermsConditionsController())->displayTC();
});
$router->get('/privacy-policy', function () {
    (new \app\controller\PrivacyPolicyController())->displayPP();
});
$router->get('/info', function () {
    (new \app\controller\InfoController())->displayInfo();
});

//homepage's contact form
$router->post('/contact-form-post', function () {
    (new HomeController())->contactFormTreatment();
});

//admin routes

$router->get('/admin-login', function () {
    (new \app\controller\AdminController())->displayAdminLogin();
});

//$router->post('/testlogin', function () {
//    (new \app\controller\AdminController())->adminLoginCheck();
//});

$router->mount('/dashboard', function() use ($router) {

    // results in '/dashboard/'
    $router->get('/', function() {
        (new \app\controller\DashboardController())->displayDashboardHome();
    });

    // results in '/dashboard/menu'
    $router->get('/menu', function() {
        (new \app\controller\DashboardController())->displayDashboardMenu();
    });

    // results in 'dashboard/menu/id'
    $router->get('/menu/(\d+)', function($id) {
        //echo 'menu id ' . htmlentities($id);
        (new \app\controller\DashboardController())->displayDashboardMenuEdit($id);
    });

    // results in 'dashboard/menu/add'
    $router->get('/menu/add', function() {
        (new \app\controller\DashboardController())->displayDashboardMenuAdd();
    });

    // results in '/dashboard/message'
    $router->get('/message', function() {
        (new \app\controller\DashboardController())->displayDashboardMessage();
    });

});


//$router->post('/admin-logout', function () {
//    (new \app\controller\AdminController())->adminLogout();
//});

// route to send superglobal post to update data
$router->post('/dashboard/update/header-section', function () {
    (new \app\controller\DashboardController())->updateHeader();
});
$router->post('/dashboard/update/hours-section', function () {
    (new \app\controller\DashboardController())->updateHours();
});

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    //echo '404, route not found!';
    (new Route404Controller())->display404();
});


// Run router
$router->run();

?>


