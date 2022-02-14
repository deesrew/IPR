<?php

/**
 * ClassA
 */
class ClassA
{
	public function methodA()
	{
		echo 'ClassA methodA<br>';
	}
}

/**
 * ClassB
 */
class ClassB
{
	public function methodB()
	{
		echo 'ClassB methodB<br>';
	}
}

/**
 * Base Adapter Interface
 */
interface AdapterInterface
{
	public function commonMethod();
}

/**
 * Adapter for ClassA
 */
class AdapterA implements AdapterInterface
{
	protected $class;

	public function __construct()
	{
		$this->class = new ClassA();
	}

	public function commonMethod()
	{
		return $this->class->methodA();
	}
}

/**
 * Adapter for ClassB
 */
class AdapterB implements AdapterInterface
{
	protected $class;

	public function __construct()
	{
		$this->class = new ClassB();
	}

	public function commonMethod()
	{
		return $this->class->methodB();
	}
}

/**
 * demo
 */

/**
 * create adapter's
 */
$adapter1 = new AdapterA();
$adapter2 = new AdapterB();

/**
 * run
 */
$adapter1->commonMethod(); // ClassA methodA
$adapter2->commonMethod(); // ClassB methodB