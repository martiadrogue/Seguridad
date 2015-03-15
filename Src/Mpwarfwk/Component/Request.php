<?php 

namespace Mpwarfwk\Component;

class Request {

	private $get;
	private $post;
	private $session;
	private $cookie;
	private $files;
	private $method;
	private $url;

	public function __construct($get = array(), $post = array(), $session = array(), $cookie = array(), $files = array(), $method = 'GET', $url = NULL) {
		
		$this->get = $get;
		$this->post = $post;
		$this->session = $session;
		$this->cookie = $cookie;
		$this->files = $files;
		$this->method = $method;
		$this->url = $url;
	}

	public function createFromGlobals() {

		$this->get = $_GET;
		$this->post = $_POST;
		$this->session = $_SESSION;
		$this->cookies = $_COOKIE;
		$this->files = $_FILES;
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->url = $_SERVER['REQUEST_URI'];

	}


	public function returnGet($key) {

		if (array_key_exists($key, $this->get)){
			return $this->get[$key];
		}
		return NULL;
	}

	public function returnPost($key) {

		if (array_key_exists($key, $this->post)){
			return $this->post[$key];
		}
		return NULL;
	}

	public function returnSession($key) {
		
		if (array_key_exists($key, $this->session)){
			return $this->session[$key];
		}
		return NULL;
	}

	public function returnCookies($key) {

		if (array_key_exists($key, $this->cookies)){
			return $this->cookies[$key];
		}
		return NULL;
	}

	public function returnFiles($key) {
		
		if (array_key_exists($key, $this->files)){
			return $this->files[$key];
		}
		return NULL;
	}

	public function returnMethod() {
		
		if (empty($this->method)){
			return NULL;
		}
		return $this->method;
	}

	public function returnUrl() {
		
		if (empty($this->url)){
			return NULL;	
		}
		return $this->url;
	}


}
