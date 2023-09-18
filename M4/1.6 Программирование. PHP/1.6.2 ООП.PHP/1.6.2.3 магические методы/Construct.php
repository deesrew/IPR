<?php
class Student {
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}
}

$objStudent = new Student('Ivan', 'ivan@ivan.ivan');