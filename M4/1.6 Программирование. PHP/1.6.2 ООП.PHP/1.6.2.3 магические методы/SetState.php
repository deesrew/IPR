<?php

class Student
{
	public $name;
	public $email;

	public static function __set_state($an_array)
	{
		$obj = new Student;
		$obj->name = $an_array['name'] . 'Two';
		$obj->email = $an_array['email'];
		return $obj;
	}
}

echo '<pre>';

$objStudent = new Student();
$objStudent->name = 'Ivan';
$objStudent->email = 'Ivan@ivan.ivan';

$objStudentExport = var_export($objStudent, true);
var_dump($objStudent);
var_dump($objStudentExport);
eval('$objStudentTwo = ' . $objStudentExport . ';');
var_dump($objStudentTwo);

