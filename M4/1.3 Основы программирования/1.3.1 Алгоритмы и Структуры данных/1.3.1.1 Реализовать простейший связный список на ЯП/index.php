<?php

echo '<pre>';

require_once "DoubleLinkedList.php";
require_once "LinkedList.php";
require_once "Node.php";

echo "LinkedList";
echo "\n\n\n\n\n";

$linkedList = new LinkedList();

$linkedList
	->append(3)
	->append(4)
	->print()
	->append(5)
	->append(1)
	->print()
	->prepend(9)
	->append(7)
	->print()
	->shift()
	->print()
	->shift()
	->print()
	->prepend(8)
	->print();;

echo "\n\n\n\n\n";
echo "DoubleLinkedList";
echo "\n\n\n\n\n";

$doubleLinked = new DoubleLinkedList();
$doubleLinked
	->append(3)
	->append(4)
	->print()
	->append(5)
	->append(1)
	->print()
	->prepend(9)
	->append(7)
	->print()
	->shift()
	->print()
	->shift()
	->prepend(8)
	->print()
	->pop()
	->append(10)
	->print();

echo '</pre>';