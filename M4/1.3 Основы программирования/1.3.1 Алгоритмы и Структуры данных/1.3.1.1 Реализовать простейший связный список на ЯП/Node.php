<?php

class Node
{
	protected $value;

	protected $nextNode;

	public function __construct($value)
	{
		$this->setValue($value);
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value): void
	{
		$this->value = $value;
	}

	/**
	 * @return Node
	 */
	public function getNextNode()
	{
		return $this->nextNode;
	}

	/**
	 * @param Node $nextNode
	 */
	public function setNextNode(mixed &$nextNode): void
	{
		$this->nextNode = $nextNode;
	}

	public function remove()
	{
		$this->value = null;
		$this->nextNode = null;
	}
}