<?php
class Student {
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

	public function __invoke()
	{
		echo 'Объект Student вызывается в качестве функции';
	}
}

$objStudent = new Student('Ivan', 'ivan@ivan.ivan');
$objStudent();
