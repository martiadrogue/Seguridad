<?php 

namespace Mpwarfwk\Http;

class Parameters {

	Private $parameters;
	
	public function __construct(Array $parameters) {

		$this->parameters = $parameters;
	}

	public function getParam($key) {
		
		if (array_key_exists($key, $this->parameters)){
			return $this->parameters[$key];
		}
		return NULL;
	}


}