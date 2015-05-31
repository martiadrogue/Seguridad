<?php

namespace Mpwarfwk\Controller;
use Mpwarfwk\Container\Container;

abstract class BaseController {

	protected $container;

    public function newContainer() {
    	$this->container = new Container();
    }
        
}