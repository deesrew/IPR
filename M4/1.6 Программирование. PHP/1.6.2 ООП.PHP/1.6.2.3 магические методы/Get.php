<?php

echo "<pre>";

class Student {
	private $data = array();

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}

	public function __get($name)
	{
		If (isset($this->data[$name])) {
			return $this->data[$name];
		}
	}
}

$objStudent = new Student();

//  вызов __set()
$objStudent->phone = '0491 570 156';

//вызов  __get()
echo $objStudent->phone;