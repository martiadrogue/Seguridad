<?php 

namespace Mpwarfwk\Component;
use Mpwarfwk\Routing\Routing;
use Mpwarfwk\Controller\ErrorController;
use Exception;

class Bootstrap {

	const ACTION_NAME = 1;
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
		
		try {
			$routingObject = $routing->createRoutingObject($request);
		} catch (Exception $e) {
	        $this->controllerNotFound($e->getMessage());
    	}


		$controllerName = $routingObject->routeToController();
		$action = $routingObject->actionDefault();

		if($request->url->numberOfValuesStored() > 1){
			$action = $request->url->returnParam(self::ACTION_NAME);
		}

		$controler = new $controllerName($request);
		$response = $controler->$action();
		$response->send();
	}

	private function controllerNotFound($message){

		$controler = new ErrorController();
		$response = $controler->error($message);
		$response->send();
		die();

	}
}