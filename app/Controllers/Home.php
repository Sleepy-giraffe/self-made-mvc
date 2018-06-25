<?php
namespace Application\Controllers;

use \Core as Core;

class Home extends Core\Controller
{

	public function index()
	{
		$this->view("index");
	}
}