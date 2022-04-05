<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    protected FilesystemLoader $loader;
    protected Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('./templates');
        $this->twig = new Environment($this->loader);
    }

    /**
     * @return FilesystemLoader
     */
    /*public function getLoader(): FilesystemLoader
    {
        return $this->loader;
    }*/

    /**
     * @return Environment
     */
    public function getTwig(): Environment
    {
        return $this->twig;
    }

    public function render(string $templateName, array $params = []): string
    {
        return $this->twig->render($templateName, $params);
    }

//    public function display(string $templateName, array $params = []): void
//    {
//        $this->twig->display($templateName, $params);
//    }


}