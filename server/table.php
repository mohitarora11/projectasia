<?php
include_once('global_var.php');
include_once('queries.php');
if($_SESSION["login"] == true){
	 include_once('header.php'); 	
	include_once('table.html');
}
else{
	header("Location: ".$GLOBALS['url']."login.php"); /* Redirect browser */
	exit();
}
?>