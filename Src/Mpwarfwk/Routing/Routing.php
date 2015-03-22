<?php 

namespace Mpwarfwk\Routing;
use Mpwarfwk\Http\Request;
use Symfony\Component\Yaml\Parser;
use Exception;

class Routing {

	const CONTROLLER_NAME = 0;
	private $controllerExists;
	    
	public function __construct() {
	    $this->controllerExists = false;
	}

	public function createRoutingObject(Request $request){

		$yaml = new Parser();
		$routingList = $yaml->parse(file_get_contents('../src/Config/routing.yml'));
		
		foreach ($routingList as $actualRoute){
			if (strtolower($actualRoute['path']) == '/' . $request->url->returnParam(self::CONTROLLER_NAME)){ 
				$routingObject = new routingObject($actualRoute['resource'], $actualRoute['actiondefault']);
				$this->controllerExists = true;
			}
		}

		if ($this->controllerExists == true) {
			return $routingObject;
		}
		throw new Exception(' LA RUTA QUE ME PIDES NO EXISTE !!');
	}
}






