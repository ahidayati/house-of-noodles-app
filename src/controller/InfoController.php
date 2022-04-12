<?php

namespace app\controller;

/**
 *
 */
class InfoController extends AbstractController
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
    public function displayInfo()
    {
        echo $this->render('info/index.html.twig', [
            'thisRoute' => $_SERVER['REQUEST_URI'],
        ]);
    }
}