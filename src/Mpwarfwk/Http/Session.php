<?php

namespace Mpwarfwk\Http;

class Session {

	public function __construct() {

		session_start();
	}

	public function getSession($key) {

		if (array_key_exists($key, $_SESSION)){
			return $_SESSION[$key];
		}
		return NULL;
	}

	public function setSession($key, $value) {

		$_SESSION[$key] = $value;
	}
}
