<?php

class App
{
	protected $controller = "Home";
	protected $action = "index";
	protected $params = [];

	public function __construct(){
		$url = $this->parseUrl();

		if (file_exists('../app/Controllers/' . ucfirst($url[0]).'.php')){
			$this->controller = ucfirst($url[0]);
			unset($url[0]);
		}

		require_once '../app/Controllers/' . $this->controller . '.php';

		$this->controller = new $this->controller;

		if (isset($url[1])) {
			if(method_exists($this->controller, $url[1])){
				$this->action = $url[1];
				unset($url[1]);
			}
		}
		$this->params = $url ? array_values($url) : [];
		call_user_func_array([$this->controller, $this->action], $this->params);
		//print_r($url);
	}

	public function parseUrl(){
		if (!empty($_GET['url'])) {
			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

}