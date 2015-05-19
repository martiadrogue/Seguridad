<?php 

namespace Mpwarfwk\Component;
use Mpwarfwk\Routing\Routing;
use Mpwarfwk\Controller\ErrorController;
use Exception;

class Bootstrap {

	const ACTION_NAME = 1;
	const ACCOUNT_VERIFY_PATH = "Controllers\AccountVerification\AccountVerification";
	private $DEBUG_BAR;
	private $ENVIRONMENT;
	    
	public function __construct($environment, $debugBar) {
	    $this->DEBUG_BAR = $debugBar;
	    $this->ENVIRONMENT = $environment;
	}

	public function execute($request){
		
		$routing = new Routing();
		
		try {
			$routingObject = $routing->createRoutingObject($request);
		} catch (Exception $e) {
	        $response = $this->handleError($e->getMessage(), $this->ENVIRONMENT);
	        return $response;
    	}


		$controllerName = $routingObject->routeToController();
		$action = $routingObject->actionDefault();

		if($request->url->numberOfValuesStored() > 1 && $controllerName != self::ACCOUNT_VERIFY_PATH){
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
