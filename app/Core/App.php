<?php

namespace Core;

//using namespace, mapped in composer.json
use \Application\Controllers as Controllers;

class App
{
	protected $controller = "Home";
	protected $action = "index";
	protected $params = [];

	public function __construct(){
		$url = $this->parseUrl();

		//Use class name for calls, instead of including class file directly
		$className = 'Controllers\\' . ucfirst($url[0]);

		if (!class_exists($className)) {
			$this->controller = new Controllers\Home($this);
		}
		else {
			$this->controller = new $className($this);
		}
		unset($url[0]);

		if (isset($url[1])) {
			if(method_exists($this->controller, $url[1])){
				$this->action = $url[1];
				unset($url[1]);
			}
		}
		$this->params = $url ? array_values($url) : [];
		call_user_func_array([$this->controller, $this->action], $this->params);
	}

	public function parseUrl(){
		if (!empty($_GET['url'])) {
			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

}