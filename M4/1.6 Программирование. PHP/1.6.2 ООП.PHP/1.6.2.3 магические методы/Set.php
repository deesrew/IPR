<?php

echo '<pre>';

class Student {
	private $data = array();

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
}

$objStudent = new Student();

// вызов  __set()
$objStudent->phone = '0491 570 156';

var_dump($objStudent);