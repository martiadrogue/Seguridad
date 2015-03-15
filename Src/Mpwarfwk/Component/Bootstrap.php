<?php 

namespace Mpwarfwk\Component;

class Bootstrap {

private $DEBUG_BAR;
private $ENVIRONMENT;
    
public function __construct($environment, $debugBar) {
    echo "Estoy en Bootstrap - ";
    $this->DEBUG_BAR = $debugBar;
    $this->ENVIRONMENT = $environment;
}

public function execute(){

	$request = new Request();
	$request->createFromGlobals();
	$url = $request->returnUrl();
	
	if (is_null($url)){
		////pendiente crear una view para mostrar error 404  header("HTTP/1.0 404 Not Found");
		echo "ERROR!!!";
  		die();	
	}

	$routing = new Routing();
	$controllerActionId = $routing->handle($url);
	$controler = new $controllerActionId["controllerRoute"]();
	$controler->build();

	}
}