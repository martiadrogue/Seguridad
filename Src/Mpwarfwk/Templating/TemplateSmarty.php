<?php

namespace Mpwarfwk\Templating;

class TemplateSmarty implements TemplateInterface {

    private $smartyView;

    public function __construct(){

        $this->smartyView = new \Smarty();
    }

    public function render($routeToTemplate){

        return $this->smartyView->fetch($routeToTemplate);
    }

    public function assignVars(Array $variables){

        foreach ($variables as $key => $value){

            $this->smartyView->assign($key,$value);
        }
    }
}