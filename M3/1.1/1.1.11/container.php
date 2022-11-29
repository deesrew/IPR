<?php

use Example\App;

include_once "ex_with_di.php";

class DI_container
{
	private $services = [];

	public function get($key)
	{
		return $this->services[$key];
	}

	public function set($key, $service)
	{
		$this->services[$key] = $service;
	}
}

$container = new DI_container();
$container->set('Service', new Services\Service('123'));
$app = new Example\App($container->get('Service'));