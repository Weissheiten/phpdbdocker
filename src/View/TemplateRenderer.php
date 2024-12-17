<?php

namespace Htlw3r\Dockerwebdemo\View;

use Twig\Environment;

class TemplateRenderer
{
    private Environment $twig;

    public function __construct(string $templatePath){
        $loader = new \Twig\Loader\FilesystemLoader($templatePath);
        $this->twig = new \Twig\Environment($loader);
    }

    /**
     * @param string $templatename Name of the templates
     * @param array $variables Variables including variable name as an associative array/map
     * @return string rendered HTML code
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $templatename, array $variables = []) : string{
        $template = $this->twig->load($templatename);
        return $template->render($variables);
    }
}