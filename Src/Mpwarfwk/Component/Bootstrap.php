<?php 

namespace Mpwarfwk\Component;
//use \Src\Controllers;

class Bootstrap {
    
    public function __construct() {
        echo "<h2>Hello World</h2>";
    }

public function execute(){

	$request = Request::returnRequest();
	$routing = new Routing();
	$controlerName = $routing->handle($request);
	echo $controlerName;
	$controler = new $controlerName();
	$controller->build();
	}
}