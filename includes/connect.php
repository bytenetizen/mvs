<?php

try {
	$db = new PDO(
		"mysql:host=$db_host;dbname=$db_name;charset=utf8",
		$db_user,
		$db_pass
	);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	var_dump($e->getMessage());
	die("A database error was encountered");
}