<?php

namespace Services;

class Service
{
	private $key;
	private $data;

	public function __cunstruct($key = null)
	{
		$this->setKey($key);
	}

	/**
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param mixed $key
	 */
	public function setKey($key): void
	{
		$this->key = $key;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param mixed $data
	 */
	public function setData($data): void
	{
		$this->data = $data;
	}
}

namespace Example;

use Services;

class App
{
	public $service;

	public function __construct(Services\Service $service = null)
	{
		$this->setService($service);
	}

	/**
	 * @return mixed
	 */
	public function getService()
	{
		return $this->service;
	}

	/**
	 * @param mixed $service
	 */
	public function setService(Services\Service $service): void
	{
		$this->service = $service;
	}

}

/* constructor injection */
$service = new Services\Service('777');
$app = new App($service);

/* property injection */
$service = new Services\Service('777');
$app = new App();
$app->service = $service;

/* method injection */
$service = new Services\Service('777');
$app = new App();
$app->setService($service);