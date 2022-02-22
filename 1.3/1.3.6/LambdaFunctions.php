<?php

// Анонимная функция
$funcAnon = function ()
	{
		echo "это анонимная функция";
	};

$funcAnon();

// callback-функций
$sortedArray = array_filter([3, 2, 1, 4, 5, 6],
	function ($value)
		{
			return $value % 2;
		}
);

var_dump($sortedArray);

// USE
$callbackWithUse = function ($maxVal) {
	return function ($val) use ($maxVal) {
		return $val > $maxVal;
	};
};

$array = array(1, 2, 3, 4, 5, 6, 7);
$arraySorted = array_filter($array, $callbackWithUse(2));

var_dump($arraySorted);