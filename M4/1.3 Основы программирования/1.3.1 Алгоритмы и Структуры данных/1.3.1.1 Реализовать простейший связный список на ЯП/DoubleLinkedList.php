<?php

require_once "LinkedList.php";
require_once "Node.php";

class DoubleNode extends Node
{
	private $previousNode;

	/**
	 * @return Node
	 */
	public function getPreviousNode()
	{
		return $this->previousNode;
	}

	/**
	 * @param Node $previousNode
	 */
	public function setPreviousNode(mixed &$previousNode): void
	{
		$this->previousNode = $previousNode;
	}
}

class DoubleLinkedList extends LinkedList
{
	/**
	 * @var DoubleNode
	 */
	protected $tail;

	/**
	 * @var DoubleNode
	 */
	protected $head;

	/**
	 * Добавить в конец
	 * @param $value
	 * @return $this
	 */
	public function append($value)
	{
		$newNode = new DoubleNode($value);

		if (!$this->head) {
			$this->head = &$newNode;
		}

		if ($this->tail) {
			$this->tail->setNextNode($newNode);
			$newNode->setPreviousNode($this->tail);
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
		$newNode = new DoubleNode($value);

		if (!$this->tail) {
			$this->tail = &$newNode;
		}

		if ($this->head) {
			$this->head->setPreviousNode($newNode);
			$newNode->setNextNode($this->head);
		}

		$this->head = &$newNode;

		$this->count++;

		return $this;
	}

	/**
	 * Убрать из конца
	 * @return $this
	 */
	public function pop()
	{
		$nodeBeforeTail = $this->tail->getPreviousNode();
		$this->tail->remove();
		$this->tail = $nodeBeforeTail;

		return $this;
	}
}