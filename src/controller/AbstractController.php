<?php

namespace app\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 *
 */
abstract class AbstractController
{
    /**
     * @var FilesystemLoader
     */
    protected FilesystemLoader $loader;
    /**
     * @var Environment
     */
    protected Environment $twig;

    /**
     *
     */
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

    /**
     * @param string $templateName
     * @param array $params
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $templateName, array $params = []): string
    {
        return $this->twig->render($templateName, $params);
    }

//    public function display(string $templateName, array $params = []): void
//    {
//        $this->twig->display($templateName, $params);
//    }


}