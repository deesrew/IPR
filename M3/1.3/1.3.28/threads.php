<?php

/**
 * Провайдер данных для потоков
 */
class MyDataProvider extends Threaded
{
	/**
	 * @var int Сколько элементов в нашей воображаемой БД
	 */
	private $total = 2000000;

	/**
	 * @var int Сколько элементов было обработано
	 */
	private $processed = 0;

	/**
	 * Переходим к следующему элементу и возвращаем его
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
 * MyWorker тут используется, чтобы расшарить провайдер между экземплярами MyWork.
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
	 * Вызывается при отправке в Pool.
	 */
	public function run()
	{
		// В этом примере нам тут делать ничего не надо
	}

	/**
	 * Возвращает провайдера
	 *
	 * @return MyDataProvider
	 */
	public function getProvider()
	{
		return $this->provider;
	}
}

/**
 * MyWork это задача, которая может выполняться параллельно
 */
class MyWork extends Threaded
{
	public function run()
	{
		do {
			$value = null;

			$provider = $this->worker->getProvider();

			// Синхронизируем получение данных
			$provider->synchronized(function($provider) use (&$value) {
				$value = $provider->getNext();
			}, $provider);

			if ($value === null)
			{
				continue;
			}

			// Некая ресурсоемкая операция
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

// Создадим провайдер. Этот сервис может например читать некие данные
// из файла или из БД
$provider = new MyDataProvider();

// Создадим пул воркеров
$pool = new Pool($threads, 'MyWorker', [$provider]);

$start = microtime(true);

// В нашем случае потоки сбалансированы.
// Поэтому тут хорошо создать столько потоков, сколько процессов в нашем пуле.
$workers = $threads;
for ($i = 0; $i < $workers; $i++) {
	$pool->submit(new MyWork());
}

$pool->shutdown();

printf("Done for %.2f seconds" . PHP_EOL, microtime(true) - $start);