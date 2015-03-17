<?php 

namespace Mpwarfwk\Http;

class Request {

	public $get;
	public $post;
	public $cookie;
	public $files;
	public $server;
	public $url;
	public $session;
	private $arrayUrl;

	
	public function __construct(Session $session) {

		$this->get = new Parameters($_GET);
		$this->post = new Parameters($_POST);
		$this->cookie = new Parameters($_COOKIE);
		$this->files = new Parameters($_FILES);
		$this->server = new Parameters($_SERVER);
		$this->session = $session;
		$this->arrayUrl = $this->divideUrl($_SERVER['REQUEST_URI']);;
		$this->url = new Url($this->arrayUrl, count($this->arrayUrl));

		$_GET = $_POST = $_COOKIE = $_SERVER = $_FILES = array();
	}


	public function divideUrl($requestUri) {
		
		$requestUri = strtolower($requestUri);
		$dividedURL = explode("/", $requestUri);
		array_shift($dividedURL);
		return $dividedURL;
	}
}