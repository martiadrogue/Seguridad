<?php 

namespace Mpwarfwk\Component;
use Mpwarfwk\Routing\Routing;

class Bootstrap {

private $DEBUG_BAR;
private $ENVIRONMENT;
    
public function __construct($environment, $debugBar) {
    echo "Estoy en Bootstrap - ";
    $this->DEBUG_BAR = $debugBar;
    $this->ENVIRONMENT = $environment;
}

public function execute($request){

	//$request = new Request(new Session());

	$routing = new Routing();
	$routingObject = $routing->createRoutingObject($request);
	
	$controllerName = $routingObject->routeToController();
	$actionDefault = $routingObject->actionDefault();

	$controler = new $controllerName();
	$controler->$actionDefault();

	}
}