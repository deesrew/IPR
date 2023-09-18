<?php

class Student {
	private $data = array(
		'phone' => '4234 234 31',
	);

	public function __unset($name)
	{
		unset($this->data[$name]);
	}
}

$objStudent = new Student();
var_dump($objStudent);
unset($objStudent->phone);
var_dump($objStudent);