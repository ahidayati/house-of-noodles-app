<?php

namespace app\controller;

class InfoController extends AbstractController
{
    function __construct()
    {
        parent::__construct();
    }

    public function displayInfo()
    {
        echo $this->render('info/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],
        ]);
    }
}