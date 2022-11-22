<?php

class FixtureTest extends \PHPUnit\Framework\TestCase {

	private $counter;

	protected function setUp(): void
	{
		$this->counter = 0;
		parent::setUp();
	}

	public function test_fixture_1()
	{
		$this->counter++;
		$this->assertSame(1, $this->counter);
	}

	public function test_fixture_2()
	{
		$this->assertSame(0, $this->counter);
	}

}