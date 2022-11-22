<?php

/**
 * Двусвязанный список
 */
$list = new SplDoublyLinkedList();
$list->push('a');
$list->push('b');
$list->push('c');
$list->push('d');

for ($list->rewind(); $list->valid(); $list->next())
{
	echo $list->current()."\n";
}

/**
 * Стек
 */
$stack = new SplStack();

// добавляем элемент в стек
$stack->push('1');
$stack->push('2');
$stack->push('3');

echo $stack->count(); // 3
echo $stack->top(); // 3
echo $stack->bottom(); // 1
echo $stack->serialize(); // i:6;:s:1:"1";:s:1:"2";:s:1:"3";

// извлекаем элементы из стека
echo $stack->pop(); // 3
echo $stack->pop(); // 2
echo $stack->pop(); // 1

/**
 * Очередь
 */
$queue = new SplQueue();

$queue->setIteratorMode(SplQueue::IT_MODE_DELETE);

$queue->enqueue('one');
$queue->enqueue('two');
$queue->enqueue('qwerty');

$queue->dequeue();
$queue->dequeue();

echo $queue->top(); // qwerty

/**
 * Кучи
 */
$heap = new SplMaxHeap();
$heap->insert('111');
$heap->insert('666');
$heap->insert('777');

echo $heap->extract(); // 777
echo $heap->extract(); // 666
echo $heap->extract(); // 111

$heap = new SplMinHeap();
$heap->insert('111');
$heap->insert('666');
$heap->insert('777');

echo $heap->extract(); // 111
echo $heap->extract(); // 666
echo $heap->extract(); // 777

/**
 * Очередь с приоритетами
 */
$queue = new SplPriorityQueue();
$queue->setExtractFlags(SplPriorityQueue::EXTR_DATA); // получаем только значения элементов

$queue->insert('Q', 1);
$queue->insert('W', 2);
$queue->insert('E', 3);
$queue->insert('R', 4);
$queue->insert('T', 5);
$queue->insert('Y', 6);

$queue->top();

while($queue->valid())
{
	echo $queue->current();
	$queue->next();
}
//YTREWQ

/**
 * Массив с фикс кол-вом элементов
 */
$a = new SplFixedArray(10000);
$count = 100000;

for($i =0; $i<$count; $i++)
{
	$a[$i] = $i;

	if ($i==9999) $a->setSize(100000);
}

/**
 * Хранилище объектов
 */
$s = new SplObjectStorage(); // создаем хранилище

$o1 = new StdClass;
$o2 = new StdClass;
$o3 = new StdClass;

$s->attach($o1); // прикрепляем к хранилищу объект
$s->attach($o2);

var_dump($s->contains($o1)); // bool(true)
var_dump($s->contains($o2)); // bool(true)
var_dump($s->contains($o3)); // bool(false)

$s->detach($o2); // открепляем объект от хранилища

var_dump($s->contains($o1)); // bool(true)
var_dump($s->contains($o2)); // bool(false)
var_dump($s->contains($o3)); // bool(false)