<?php
class Student {
	private $name;
	private $email;
	private $phone;
	private $db_connection_link;

	public function __construct($name, $email, $phone)
	{
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
	}

	/**
	 * Вызывается только при serialize()
	 */
	public function __sleep()
	{
		return array('name', 'email', 'phone');
	}

	/**
	 * Восстанавливает потеренные связи
	 */
	public function __wakeup()
	{
		$this->db_connection_link = '0.0.0.0:3308@root:root';
	}
}

echo '<pre>';

$newStudent = new Student('Ivan', 'ivan@mail.ivan', '78951 321 48');
var_dump(serialize($newStudent));
var_dump(unserialize(serialize($newStudent)));