<?php

$arrayCount = mt_rand(1000, 10000);
$array = [];

for ($i = 0; $i < $arrayCount; $i++)
{
	$array[] = mt_rand(0, 1000);
}

$value = 777;

for ($i = 0; $i < $arrayCount; $i++)
{
	if ($value == $array[$i])
	{
		echo "\$arrayCount = $arrayCount, Результат: \$array[" . $i . "] = " . $array[$i];
		break;
	}
}

echo "<br><br><br><br>";

var_dump($array);
