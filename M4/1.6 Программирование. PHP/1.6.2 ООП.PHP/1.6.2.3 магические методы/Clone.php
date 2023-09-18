<?php

class City {}

class Student {
	private $name;

	private $email;

	private $school;
	private $cityObject;

	public function __construct()
	{
		$this->cityObject = new City();
		$this->object_student_school = 'Школа 66';
	}

	public function __clone()
	{
		/**
		 * Клонируем поле, которое ссылается на объект
		 * Иначе поле будет ссылаться на один и тот же объект
		 */
		$this->cityObject = clone $this->cityObject;
		$this->object_student_school = 'Сельская школа';
	}
}

echo '<pre>';

$objStudentOne = new Student();
$objStudentTwo = clone $objStudentOne;

var_dump($objStudentOne);
var_dump($objStudentTwo);