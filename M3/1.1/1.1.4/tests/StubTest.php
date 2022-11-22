<?php

require_once __DIR__ . '/../Duck.php';

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
	public function testStub()
	{
		// Arrange
		$stub = $this->createMock(Duck::class);

		// Act
		// Настроить заглушку.
		$stub->method('quack')
			->willReturn('quack');

		// Assert
		$this->assertSame('quack', $stub->quack());
	}
}