<?php

class Bar {
	protected $inheritedProperty = 'унаследованное свойство по умолчанию';
}

class Foo extends Bar {
	public $property = 'свойство по умолчанию';
	private $privateProperty = 'закрытое свойство по умолчанию';
	public static $staticProperty = 'статическое свойство';
	public $defaultlessProperty;
}

$reflectionClass = new ReflectionClass('Foo');
var_dump($reflectionClass->getDefaultProperties());