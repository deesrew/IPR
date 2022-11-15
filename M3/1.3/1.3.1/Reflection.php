<?php

/**
 * Class Profile
 */
class Profile
{
	/**
	 * @return string
	 */
	public function getUserName(): string
	{
		return 'Foo';
	}

	// закрытый метод getName()
	private function getName(): string
	{
		return 'Foo';
	}
}

/**
 * Дочерний класс
 */
class Child extends Profile
{

}

// инициализация
$reflectionClass = new ReflectionClass('Profile');

// получить имя класса
var_dump($reflectionClass->getName());

// получить документацию класса
var_dump($reflectionClass->getDocComment());

// ReflectionClass: сообщает информацию о классе.
// ReflectionFunction: сообщает информацию о функции.
// ReflectionParameter: извлекает информацию о параметрах функции или метода.
// ReflectionClassConstant: сообщает информацию о константе класса.

/**
 *  EX 1
 */

$class = new ReflectionClass('Child');

// получаем список всех родителей
print_r($class->getParentClass());

/**
 *  Ex 2
 */

$method = new ReflectionMethod('Profile', 'getUserName');
// Получить документацию метода getUserName
var_dump($method->getDocComment());

/**
 *  Ex 3
 */

$class = new ReflectionClass('Profile');
$obj = new Profile();
// валидации объектов
var_dump($class->isInstance($obj)); // bool(true)
var_dump(is_a($obj, 'Profile')); // bool(true)
var_dump($obj instanceof Profile); // bool(true)

/**
 * Ex 4
 */

$method = new ReflectionMethod('Profile', 'getUserName');

// проверим, является ли метод закрытым и сделаем его доступным

if ($method->isPrivate()) {
	$method->setAccessible(true);
}
// ReflectionFunction::invoke — Вызывает функцию
echo $method->invoke(new Profile()); // Foo