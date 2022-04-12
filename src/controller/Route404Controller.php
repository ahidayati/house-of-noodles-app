<?php

namespace app\controller;

/**
 *
 */
class Route404Controller extends AbstractController
{

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function display404()
    {
        echo $this->render('404/index.html.twig', [

        ]);
    }
}