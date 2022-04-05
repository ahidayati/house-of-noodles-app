<?php

namespace app\controller;

class PrivacyPolicyController extends AbstractController
{
    function __construct()
    {
        parent::__construct();
    }

    public function displayPP()
    {

        echo $this->render('privacy_policy/index.html.twig', [

        ]);
    }
}