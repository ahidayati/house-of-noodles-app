<?php

namespace app\controller;

class TermsConditionsController extends AbstractController
{
    function __construct()
    {
        parent::__construct();
    }

    public function displayTC()
    {
        echo $this->render('terms_conditions/index.html.twig', [

        ]);
    }
}