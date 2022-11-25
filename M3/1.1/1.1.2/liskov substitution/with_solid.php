<?php

class Rectangle
{
	protected $width;
	protected $height;

	public function setWidth($width)
	{
		$this->width = $width;
	}

	public function setHeight($height)
	{
		$this->height = $height;
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function getHeight()
	{
		return $this->height;
	}
}

class Square
{
	protected $size;

	public function setSize($size)
	{
		$this->size = $size;
	}

	public function getSize()
	{
		return $this->size;
	}
}