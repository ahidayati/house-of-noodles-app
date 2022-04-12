<?php

namespace app\controller;

/**
 *
 */
class PrivacyPolicyController extends AbstractController
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
    public function displayPP()
    {

        echo $this->render('privacy_policy/index.html.twig', [

        ]);
    }
}