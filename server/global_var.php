<?php
if(!isset($_SESSION)){ //Doesn't let Browser create Cache
	if ( isset($_REQUEST['PHPSESSID'])){
		session_id($_REQUEST['PHPSESSID']);
	}
	session_start();
}
$url="http://localhost/projectasia/";
$serverurl="http://localhost/projectasia/server/";
//$url="http://www.globalbusinessart.com/server/";
//$serverurl="http://www.globalbusinessart.com/server/";
//$url="http://digiqom.com/kfc/";
$bpc=3;

if(!isset($_SESSION["login"])){
	$_SESSION["login"]=false;
}
?>