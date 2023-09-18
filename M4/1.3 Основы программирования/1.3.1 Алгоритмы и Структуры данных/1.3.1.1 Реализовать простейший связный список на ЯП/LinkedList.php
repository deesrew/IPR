<?php

include "Node.php";

class LinkedList
{
	protected static $instance;

	/**
	 * @return LinkedList
	 */
	public static function getInstance(): LinkedList
	{
		return self::$instance ?: self::$instance = new self();
	}

	/**
	 * @var Node
	 * Хвост (последний элемент)
	 */
	protected $tail;

	/**
	 * @var Node
	 * Голова (первый элемент)
	 */
	protected $head;

	/**
	 * Количество элементов в списке
	 *
	 * @var integer
	 */
	protected $count;

	/**
	 * Добавить в конец
	 * @param $value
	 * @return $this
	 */
	public function append($value)
	{
		$newNode = new Node($value);

		if (!$this->head) {
			$this->head = &$newNode;
		}

		if ($this->tail) {
			$this->tail->setNextNode($newNode);
		}

		$this->tail = &$newNode;

		$this->count++;

		return $this;
	}

	/**
	 * Добавить в начало
	 * @param $value
	 * @return $this
	 */
	public function prepend($value)
	{
		$newNode = new Node($value);

		if (!$this->tail) {
			$this->tail = &$newNode;
		}

		if ($this->head) {
			$newNode->setNextNode($this->head);
		}

		$this->head = &$newNode;

		$this->count++;

		return $this;
	}

	/**
	 * Убрать из начала
	 * @return $this
	 */
	public function shift()
	{
		$nodeAfterHead = $this->head->getNextNode();
		$this->head->remove();
		$this->head = $nodeAfterHead;

		return $this;
	}

	public function print()
	{
		$linkedListPrintResult = [];

		$currentNode = $this->head;

		do {
			$linkedListPrintResult[] = $currentNode->getValue();
		} while ($currentNode = $currentNode->getNextNode());

		var_dump($linkedListPrintResult);

		return $this;
	}
}