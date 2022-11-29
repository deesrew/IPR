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

namespace bad1;

use Services;

class App
{
	protected $service;

	public function __construct()
	{
		$this->service = new Services\Service('key');
	}

	public function getData()
	{
		$this->service->getData();
	}
}

$app = new App();
$app_data = $app->getData();

namespace bad2;

use Services;

class App
{
	protected $service;

	public function __construct($key)
	{
		$this->service = new Services\Service($key);
	}

	public function getData()
	{
		$this->service->getData();
	}
}

$app = new App('key');
$app_data = $app->getData();