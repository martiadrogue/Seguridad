<?php 

namespace Mpwarfwk\Component;
use Symfony\Component\Yaml\Parser;

class Routing {

private $controllerActionId;
    
public function __construct() {
    echo "Ahora estoy en Routing - ";
    $controllerActionId = array("controllerRoute" => NULL, "actionName" => NULL, "id" => NULL);
}

public function handle($request){

	echo "El request URI es: " . $request . " - ";
	$yaml = new Parser();
	$routingList = $yaml->parse(file_get_contents('../src/Config/routing.yml'));
	
	$stringURL = explode("/", $request);
	$controllerName = strtolower($stringURL[1]);

	if (count($stringURL) == 3){
		$this->controllerActionId["actionName"] = $stringURL[2];
	}

	if (count($stringURL) == 4){
		$this->controllerActionId["id"] = $stringURL[3];
	}

	foreach ($routingList as $actualRoute){
		if (strtolower($actualRoute['path']) == '/' . $controllerName){ 
			$this->controllerActionId["controllerRoute"] = $actualRoute['resource'];
		}
	}

	if ($this->controllerActionId["controllerRoute"] == NULL){
		//pendiente crear una view para mostrar error 404  header("HTTP/1.0 404 Not Found");
		echo "ERROR!!!";
  		die();	
	}

	//return "\Controllers\Home\Home";
	return $this->controllerActionId;

	}
	
}






