<?php

namespace Mpwarfwk\Templating;

use Smarty;

class TemplateSmarty implements TemplateInterface {

    private $smartyView;

    public function __construct(){

        $this->smartyView = new Smarty();
    }

    public function render($routeToTemplate, $variables = null){

        return $this->smartyView->fetch($routeToTemplate);
    }

    public function assignVars($variables){

        foreach ($variables as $key => $value){

            $this->smartyView->assign($key,$value);
        }
    }
}