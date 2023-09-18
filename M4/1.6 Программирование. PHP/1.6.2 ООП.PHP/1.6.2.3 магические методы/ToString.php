<?php

echo '<pre>';

class Student {
	private $name;
	private $email;

	public function __construct($name, $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

	public function __toString()
	{
		return 'Student name: '.$this->name
			. '<br>'
			. 'Student email: '.$this->email;
	}
}

$objStudent = new Student('Ivan', 'ivan@ivan.ivan');
echo $objStudent;