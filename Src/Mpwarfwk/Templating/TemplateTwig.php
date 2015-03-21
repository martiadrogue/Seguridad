<?php

namespace Mpwarfwk\Templating;
use Twig_Loader_Filesystem;
use Twig_Environment;

class TemplateTwig implements TemplateInterface {

    private $loader;
    private $twig;

    public function __construct(){

        $this->loader = new Twig_Loader_Filesystem('../src/Templates');
        $this->twig = new Twig_Environment($this->loader, array('cache' => false));
    }

    public function render($routeToTemplate, $variables = array()){

        return $this->twig->render($routeToTemplate, $variables);
    }

    public function assignVars($variables){

    }
}