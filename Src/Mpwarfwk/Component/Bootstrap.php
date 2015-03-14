<?php 

namespace Mpwarfwk\Component;

class Bootstrap {

private $debugBar = false;
    
public function __construct($debugBar) {
    echo "Estoy en Bootstrap - ";
    $this->debugBar = $debugBar;
}

public function execute(){

	$request = Request::returnRequest();
	$routing = new Routing();
	$controlerName = $routing->handle($request);
	//echo $controlerName;
	$controler = new $controlerName();
	$controler->build();
	}
}