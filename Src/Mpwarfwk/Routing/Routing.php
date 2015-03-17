<?php 

namespace Mpwarfwk\Routing;
use Mpwarfwk\Http\Request;
use Symfony\Component\Yaml\Parser;

class Routing {

	const CONTROLLER_NAME = 0;
	private $controllerExists;
	    
	public function __construct() {
	    echo "Ahora estoy en Routing - ";
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
		//return "\Controllers\Home\Home";
		//pendiente crear una view para mostrar error 404  header("HTTP/1.0 404 Not Found");
		echo "ERROR!!";
		die();
	}
}






