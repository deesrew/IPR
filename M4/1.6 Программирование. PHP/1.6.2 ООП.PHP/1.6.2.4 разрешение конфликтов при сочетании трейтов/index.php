<?php

trait Trait1
{
	public function method()
	{
		return 1;
	}
}

trait Trait2
{
	public function method()
	{
		return 2;
	}
}

// Данный код выдаст ошибку!
class ExampleClass
{
	use Trait1, Trait2 {
		Trait1::method insteadof Trait2; // берем метод из первого трейта
		Trait1::method as method1; // метод первого трейта будет доступен как method1
		Trait2::method as method2; // метод второго трейта будет доступен как method2
	}

	public function __construct()
	{
		echo $this->method(); // 1
//		echo $this->method1() // 1
		echo $this->method2(); // 1
	}
}

$a = new ExampleClass();