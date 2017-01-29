<?php
/**/
$sql_details = array(
	'user' => 'root',
	'pass' => 'root',
	'db'   => 'samar',
	'host' => '127.0.0.1'
);
/*
'user' => 'gourishankarsql',
	'pass' => 'ProjectAsia@123',
	'db'   => 'globalbusinessart',
	'host' => '127.0.0.1'*/

/*
$sql_details = array(
	'user' => 'merchantbonus',
	'pass' => 'PPuG@875tDg',
	'db'   => 'merchantbonus',
	'host' => 'merchantbonus.db.9297235.hostedresource.com'
);
*/

$conn = new PDO("mysql:host=".$sql_details['host'].";dbname=".$sql_details['db'], $sql_details['user'], $sql_details['pass']);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>