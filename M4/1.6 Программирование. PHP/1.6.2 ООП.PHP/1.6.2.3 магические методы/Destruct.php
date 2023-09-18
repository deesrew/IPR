<?php

class Student {
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

	public function __destruct()
	{
		echo 'Вызывается во время уничтожения объекта...' . '<br>';
		// сохранение состояния объекта или другие действия
	}
}

$objStudent = new Student('Ivan', 'ivan@ivan.ivan');
unset($objStudent);

print_r('Программа всё ещё работает!<br>');
print_r('Конец программы<br>');
