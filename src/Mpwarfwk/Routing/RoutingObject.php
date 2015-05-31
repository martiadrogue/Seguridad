<?php 

namespace Mpwarfwk\Routing;

class RoutingObject {

	private $routeToController;
	private $actionDefault;
	    
	public function __construct($routeToController, $actionDefault) {
	    
	    $this->routeToController = $routeToController;
	    $this->actionDefault = $actionDefault;
	}

	public function routeToController(){

		return $this->routeToController;
	}

	public function actionDefault(){

		return $this->actionDefault;
	}
}

