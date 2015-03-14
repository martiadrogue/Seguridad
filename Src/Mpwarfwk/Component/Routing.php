<?php 

namespace Mpwarfwk\Component;
use Symfony\Component\Yaml\Parser;

class Routing {

private $controllerRoute;
    
public function __construct() {
    echo "Ahora estoy en Routing - ";
    $this->controllerRoute = NULL;
}

public function handle($request){

	echo "El request URI es: " . $request . " - ";
	$yaml = new Parser();
	$routingList = $yaml->parse(file_get_contents('../src/Config/routing.yml'));
	
	$stringURL = explode("/", $request);
	$controllerName = strtolower($stringURL[1]);

	foreach ($routingList as $actualRoute){
		if (strtolower($actualRoute['path']) == '/' . $controllerName){ 
			$this->controllerRoute = $actualRoute['resource'];
		}
	}

	if ($this->controllerRoute == NULL){
		//pendiente crear una view para mostrar error 404  header("HTTP/1.0 404 Not Found");
		echo "ERROR!!!";
  		die();	
	}
	//return "\Controllers\Home\Home";
	return $this->controllerRoute;

	}
	
}






