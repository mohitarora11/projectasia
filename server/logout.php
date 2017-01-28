<?php 
include_once('global_var.php'); 
  
	if(isset($_SESSION["login"])){
		session_destroy();
		header("Location:".$GLOBALS['url']."login.php");
		exit();
    }
?>