<?php

$settingsArray = [
	'is_admin' => false,
	'is_editor' => false,
	'admin_pass' => 'asd123asd'
];

setcookie("is_admin", false, time()+3600);
setcookie("settings", serialize($settingsArray), time()+3600);
