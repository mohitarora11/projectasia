<?php
	include_once('global_var.php');
	include_once('queries.php');
	if($_SESSION["login"] == true){
		$user = new newuser();
		$csvOutput = $user->getTableDump();
		
exit();
	}
	else{
		header("Location: ".$GLOBALS['url']."login.php"); /* Redirect browser */
		exit();
	}
	
?>