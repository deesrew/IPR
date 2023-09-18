<?php
class Student {
	public function __call($methodName, $arguments)
	{
		var_dump([
			'Название метода:' . $methodName,
			'Аргументы' => $arguments
		]);
	}

	public static function __callStatic($methodName, $arguments)
	{
		var_dump([
			'Название статического метода:' . $methodName,
			'Аргументы' => $arguments
		]);
	}
}

echo '<pre>';

$objStudent = new Student();
$objStudent->getStudentDetails('Иван', 'Иванов');
$objStudent::getStudentDetailsStatic('Иван', 'Иванов');

