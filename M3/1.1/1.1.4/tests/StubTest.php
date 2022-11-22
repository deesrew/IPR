<?php

require_once __DIR__ . '/../Duck.php';

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
	public function testStub()
	{
		$stub = $this->createMock(Duck::class);

		// Настроить заглушку.
		$stub->method('quack')
			->willReturn('quack');

		$this->assertSame('quack', $stub->quack());
	}
}