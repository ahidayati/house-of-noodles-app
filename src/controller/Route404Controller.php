<?php

namespace app\controller;

class Route404Controller extends AbstractController
{

    function __construct()
    {
        parent::__construct();
    }

    public function display404()
    {
        echo $this->render('404/index.html.twig', [

        ]);
    }
}