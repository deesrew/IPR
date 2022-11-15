<?php

$pid = pcntl_fork();
if ($pid == -1)
{
	die('Не удалось породить дочерний процесс');
}
elseif ($pid)
{
	// Код родительского процесса
	pcntl_wait($status); // Защита против дочерних "Зомби"-процессов
}
else
{
	// Код дочернего процесса
}


/**
 * Алгоритм запускает 5 дочерних процессов и ждет окончание их всех,
 * после этого он сам завершает свою работу
 */

$worker_processes = 5;
$child_processes = array();

for ($i = 0; $i < $worker_processes; $i++) {

	$child_pid = pcntl_fork();

	if ($child_pid == -1)
	{
		die ("Can't fork process");
	}
	elseif ($child_pid)
	{
		print "Parent, created child: $child_pid\n";
		$child_processes[] = $child_pid;

		# В данный момент все процессы отфоркнуты, можно начать ожидание
		if ($i == ($worker_processes -1))
		{
			foreach ($child_processes as $process_pid)
			{
				# Ждем завершение заданного дочернего процесса
				$status = 0;

				print "pcntl_waitpid\n";

				pcntl_waitpid($process_pid,$status);
			}
		}
	}
	else
	{
		print "Child $i\n";
		sleep(10 + $i);

		# Если здесь не будет exit, то foreach заработает и здесь
		exit(0);
	}
}