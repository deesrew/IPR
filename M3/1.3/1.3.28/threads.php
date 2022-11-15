<?php

/**
 * ��������� ������ ��� �������
 */
class MyDataProvider extends Threaded
{
	/**
	 * @var int ������� ��������� � ����� ������������ ��
	 */
	private $total = 2000000;

	/**
	 * @var int ������� ��������� ���� ����������
	 */
	private $processed = 0;

	/**
	 * ��������� � ���������� �������� � ���������� ���
	 *
	 * @return mixed
	 */
	public function getNext()
	{
		if ($this->processed === $this->total) {
			return null;
		}

		$this->processed++;

		return $this->processed;
	}
}

/**
 * MyWorker ��� ������������, ����� ��������� ��������� ����� ������������ MyWork.
 */
class MyWorker extends Worker
{
	/**
	 * @var MyDataProvider
	 */
	private $provider;

	/**
	 * @param MyDataProvider $provider
	 */
	public function __construct(MyDataProvider $provider)
	{
		$this->provider = $provider;
	}

	/**
	 * ���������� ��� �������� � Pool.
	 */
	public function run()
	{
		// � ���� ������� ��� ��� ������ ������ �� ����
	}

	/**
	 * ���������� ����������
	 *
	 * @return MyDataProvider
	 */
	public function getProvider()
	{
		return $this->provider;
	}
}

/**
 * MyWork ��� ������, ������� ����� ����������� �����������
 */
class MyWork extends Threaded
{
	public function run()
	{
		do {
			$value = null;

			$provider = $this->worker->getProvider();

			// �������������� ��������� ������
			$provider->synchronized(function($provider) use (&$value) {
				$value = $provider->getNext();
			}, $provider);

			if ($value === null)
			{
				continue;
			}

			// ����� ������������ ��������
			$count = 100;
			for ($j = 1; $j <= $count; $j++)
			{
				sqrt($j+$value) + sin($value/$j) + cos($value);
			}
		}
		while ($value !== null);
	}
}





$threads = 8;

// �������� ���������. ���� ������ ����� �������� ������ ����� ������
// �� ����� ��� �� ��
$provider = new MyDataProvider();

// �������� ��� ��������
$pool = new Pool($threads, 'MyWorker', [$provider]);

$start = microtime(true);

// � ����� ������ ������ ��������������.
// ������� ��� ������ ������� ������� �������, ������� ��������� � ����� ����.
$workers = $threads;
for ($i = 0; $i < $workers; $i++) {
	$pool->submit(new MyWork());
}

$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);