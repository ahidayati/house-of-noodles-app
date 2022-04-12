<?php

namespace app\controller;

/**
 *
 */
class TermsConditionsController extends AbstractController
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
    public function displayTC()
    {
        echo $this->render('terms_conditions/index.html.twig', [

        ]);
    }
}