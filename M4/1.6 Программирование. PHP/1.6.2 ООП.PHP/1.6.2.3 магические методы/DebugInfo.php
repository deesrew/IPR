<?php
class Student {
	public $name;
	private $email;
	private $ssn;

	public function __debugInfo()
	{
		return array('student_name' => $this->name);
	}
}

$objStudent = new Student();
var_dump($objStudent);