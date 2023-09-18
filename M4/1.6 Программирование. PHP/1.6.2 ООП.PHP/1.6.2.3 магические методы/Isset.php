<?php

class Student {
	private $data = array(
		'phone' => '4234 234 31',
	);

	public function __isset($name)
	{
		return isset($this->data[$name]);
	}
}

$objStudent = new Student();
var_dump(isset($objStudent->phone));
var_dump(isset($objStudent->address));