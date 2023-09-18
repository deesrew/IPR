<?php

echo '<pre>';

$conn = new mysqli("mysql", "user", "root");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "<br>Подключение успешно установлено";

$queryUse = "use ipr";
$conn->query($queryUse);

$queryDrop = 'DROP TABLE IF EXISTS `orders`';
if($conn->query($queryDrop)){
	echo "<br>Таблица ТОВАРЫ успешно удалена!";
} else{
	echo "Ошибка: " . $conn->error;
}
$queryDrop = 'DROP TABLE IF EXISTS `users`';
if($conn->query($queryDrop)){
	echo "<br>Таблица ПОЛЬЗОВАТЕЛИ успешно удалена!";
} else{
	echo "Ошибка: " . $conn->error;
}

$queryCreate = 'CREATE TABLE IF NOT EXISTS `orders` (`id` INT(11) NOT NULL, `is_payed` TINYINT(1) NOT NULL DEFAULT \'0\', `category_name` varchar(32) DEFAULT NULL)';
if($conn->query($queryCreate)){
	echo "<br>Таблица ТОВАРЫ успешно создана!";
} else{
	echo "Ошибка: " . $conn->error;
}

$queryCreate = 'CREATE TABLE IF NOT EXISTS `users` (`id` INT(11) NOT NULL, `login` varchar(32) NOT NULL, `pass` varchar(32) NOT NULL)';
if($conn->query($queryCreate)){
	echo "<br>Таблица ПОЛЬЗОВАТЕЛИ успешно создана!";
} else{
	echo "Ошибка: " . $conn->error;
}

$queryInsert = 'INSERT INTO `orders` (`id`, `is_payed`, `category_name`) VALUES (1, 0, \'gifts\'), (2, 0, \'gifts\'), (3, 4, \'gifts\')';
if($conn->query($queryInsert)){
	echo "<br>Значения ТОВАРОВ успешно вставлены!";
} else{
	echo "Ошибка: " . $conn->error;
}

$queryInsert = 'INSERT INTO `users`  (`id`, `login`, `pass`) VALUES (1, \'root\', \'root\')';
if($conn->query($queryInsert)){
	echo "<br>Значения ПОЛЬЗОВАТЕЛЕЙ успешно вставлены!";
} else{
	echo "Ошибка: " . $conn->error;
}

$type = $_GET['type'];

$querySelect = "SELECT * FROM `orders` where `category_name` = '$type' and `is_payed` = 1";

echo "<br><br><br>";
var_dump($type);
var_dump($querySelect);
echo "<br><br><br>";

/**
 * вставить в get-параметр вместо ?type=gifts -> ?type=gifts'+OR+'1'='1
 */

if($selectResult = $conn->query($querySelect)){
	echo "<br>Значения успешно получены!";
} else{
	echo "Ошибка: " . $conn->error;
}

foreach ($selectResult as $selectResultItem)
{
	var_dump($selectResultItem);
}

$conn->close();
