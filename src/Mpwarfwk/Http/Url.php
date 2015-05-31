<?php 

namespace Mpwarfwk\Http;

class Url {

	private $arrayUrl;
	private $numOfValues;

	public function __construct(Array $arrayUrl, $numOfValues) {

		$this->arrayUrl = $arrayUrl;
		$this->numOfValues = $numOfValues;
	}

	public function numberOfValuesStored(){

		return $this->numOfValues;
	}

	public function returnParam($number){

		if ($number < $this->numOfValues) {
			return $this->arrayUrl[$number];
		}
		return NULL;
	}
}


