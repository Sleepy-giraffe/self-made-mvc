<?php

namespace Core;

class Controller
{
	public function view($view, $data = []){
		$class = (new \ReflectionClass($this))->getShortName();

		// location where basic layouts are stored
		$layoutLoader = new \Twig_Loader_Filesystem('../app/Views/Layout');

		// location with the views related to the current controller, according to $class variable
		$viewLoader = new \Twig_Loader_Filesystem('../app/Views/' . $class);

		$loader = new \Twig_Loader_Chain(array($layoutLoader, $viewLoader));

		$twig = new \Twig_Environment($loader);

		echo $twig->render($view . '.html.twig');
	}
}