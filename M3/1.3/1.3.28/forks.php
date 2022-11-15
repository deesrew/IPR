<?php

$pid = pcntl_fork();
if ($pid == -1)
{
	die('�� ������� �������� �������� �������');
}
elseif ($pid)
{
	// ��� ������������� ��������
	pcntl_wait($status); // ������ ������ �������� "�����"-���������
}
else
{
	// ��� ��������� ��������
}


/**
 * �������� ��������� 5 �������� ��������� � ���� ��������� �� ����,
 * ����� ����� �� ��� ��������� ���� ������
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

		# � ������ ������ ��� �������� ����������, ����� ������ ��������
		if ($i == ($worker_processes -1))
		{
			foreach ($child_processes as $process_pid)
			{
				# ���� ���������� ��������� ��������� ��������
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

		# ���� ����� �� ����� exit, �� foreach ���������� � �����
		exit(0);
	}
}