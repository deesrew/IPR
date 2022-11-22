<?php

// Обычное наследование

class ParentClass
{
	public function run()
	{
		echo "run";

		return $this;
	}

	public function stop()
	{
		echo "stop";

		return $this;
	}
}

class ChildClass extends ParentClass
{
	public function wait()
	{
		echo "wait";

		return $this;
	}

}

$obj = new ChildClass();
$obj->run()
	->wait()
	->stop();

class Header
{
	public function print()
	{
		echo 'HEAD';
		return $this;
	}
}

class Body
{
	public function print()
	{
		echo 'BODY';
		return $this;
	}
}

class Footer
{
	public function print()
	{
		echo 'FOOTER';
		return $this;
	}
}

// Композиция

class WebSite
{
	protected $head;
	protected $body;
	protected $footer;

	public function __construct()
	{
		$this->head = new Header();
		$this->body = new Body();
		$this->footer = new Footer();
	}

	public function create()
	{
		$this->head->print();
		$this->body->print();
		$this->body->print();
	}
}

$webSite = new WebSite();
$webSite->create();

// Агрегация

class WebSiteV2
{
	public function create($head, $body, $footer)
	{
		$head->print();
		$body->print();
		$footer->print();
	}
}

$webSite = new WebSiteV2();

$head = new Header();
$body = new Body();
$footer = new Footer();

$webSite->create($head, $body, $footer);