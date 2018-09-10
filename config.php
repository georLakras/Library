<?php
	//Config.php file is having information about MySQL Data base configuration.
	$db_host = '127.0.0.1';
	$db_user = 'giorgos';
	$db_password = '333';
	$db_name = 'library';

	$connect = mysqli_connect($db_host, $db_user, $db_password, $db_name);
	$connect -> set_charset("utf8");

	If (mysqli_connect_errno()){
		echo 'This connection has failed!'. mysqli_connect_error();
		die();
	}
?>
