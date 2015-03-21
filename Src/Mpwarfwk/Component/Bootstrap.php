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
	        $response = $this->handleError($e->getMessage(), $this->ENVIRONMENT);
	        return $response;
    	}


		$controllerName = $routingObject->routeToController();
		$action = $routingObject->actionDefault();

		if($request->url->numberOfValuesStored() > 1){
			$action = $request->url->returnParam(self::ACTION_NAME);
		}

		$controler = new $controllerName();

		try {
		$response = $controler->$action($request);
		} catch (Exception $e) {
	        $response = $this->handleError($e->getMessage(), $this->ENVIRONMENT);
	        return $response;
    	}

		return $response;
	}

	private function handleError($message, $environment){

		$controler = new ErrorController();
		$response = $controler->error($message, $environment);
		return $response;

	}
}