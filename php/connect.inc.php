<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'scouting');
	define('DB_PASSWORD', 'Pi,=1676_Oneers2');
	define('DB_DATABASE', 'scouting_2017');
	$scouting = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


	define('DB_SERVER2', 'localhost');
	define('DB_USERNAME2', 'pi_accounts');
	define('DB_PASSWORD2', 'Pi,=1676_Oneers2');
	define('DB_DATABASE2', 'pioneer_accounts');
	$login = mysqli_connect(DB_SERVER2,DB_USERNAME2,DB_PASSWORD2,DB_DATABASE2);
?> 