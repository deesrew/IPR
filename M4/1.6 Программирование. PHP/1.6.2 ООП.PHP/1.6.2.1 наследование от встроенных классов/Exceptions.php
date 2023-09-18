<?php

echo '<pre>';

/**
 * Определим свой класс исключения
 */
class MyException extends Exception
{
	// Переопределим исключение так, что параметр message станет обязательным
	public function __construct($message, $code = 0, Exception $previous = null) {
		// некоторый код

		// убедитесь, что все передаваемые параметры верны
		parent::__construct($message, $code, $previous);
	}

	// Переопределим строковое представление объекта.
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}

	public function customFunction() {
		echo "Мы можем определять новые методы в наследуемом классе\n";
	}
}

/**
 * Создадим класс для тестирования исключения
 */
class TestException
{
	public $var;

	const THROW_NONE    = 0;
	const THROW_CUSTOM  = 1;
	const THROW_DEFAULT = 2;

	function __construct($avalue = self::THROW_NONE) {

		switch ($avalue) {
			case self::THROW_CUSTOM:
				// Бросаем собственное исключение
				throw new MyException('1 - неправильный параметр', 5);
				break;

			case self::THROW_DEFAULT:
				// Бросаем встроеное исключение
				throw new Exception('2 - недопустимый параметр', 6);
				break;

			default:
				// Никаких исключений, объект будет создан.
				$this->var = $avalue;
				break;
		}
	}
}

// Example 1
try {
	$o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) {      // Will be caught
	echo "Поймано собственное переопределенное исключение\n", $e;
	$e->customFunction();
} catch (Exception $e) {        // Будет пропущено.
	echo "Поймано встроенное исключение\n", $e;
}

// Отсюда будет продолжено выполнение программы
var_dump($o); // Null
echo "\n\n";


// Example 2
try {
	$o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) {      // Тип исключения не совпадет
	echo "Поймано переопределенное исключение\n", $e;
	$e->customFunction();
} catch (Exception $e) {        // Будет перехвачено
	echo "Перехвачено встроенное исключение\n", $e;
}

// Отсюда будет продолжено выполнение программы
var_dump($o); // Null
echo "\n\n";


// Example 3
try {
	$o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) {        // Будет перехвачено.
	echo "Поймано встроенное исключение\n", $e;
}

// Продолжение исполнения программы
var_dump($o); // Null
echo "\n\n";