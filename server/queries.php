<?php

include_once("db_connection.php");
include_once("global_var.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/Bangkok");
class newuser{
var $id,$email,$name,$lname,$mobile,$type,$rstring,$answerstatus;

	/* for checking if student exists or not */
	
	function getUserIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}
	
	function checkifexist(){
		global $conn;
		$q = "SELECT * FROM student WHERE email='".$this->$email."'";
		$res = $conn->prepare($q);
		$res->execute();		
		$count = $res->rowCount();
		if($count > 0){
			return 1;
		}else{
			return 0;
		}
	}

	function createNewUser(){
		global $conn;
		$ipaddress = $this->getUserIP();
		$sql = "INSERT INTO userinfo(name,email,mobile,type,ipaddress,rstring)
				VALUES('".$this->name."','".$this->email."','".$this->mobile."','".$this->type."','".$ipaddress."','".$this->rstring."')";
		$res = $conn->prepare($sql);
		//return $this->getEmail();
		return $res->execute();
	}

	function deleteUser() {
		global $conn;
		$sql = "delete from userinfo where rstring = '".$this->rstring."'";
		$res = $conn->prepare($sql);
		return $res->execute();
	}

	function sendEmail() {
		/*$to      = 'mohit.11.arora@gmail.com';
	    $subject = 'The subject';
	    $message = 'hello';
	    $headers = 'From: mohit.11.arora@gmail.com' . "\r\n" .
	        'Reply-To: mohit_arora11@yahoo.co.in' . "\r\n" .
	        'X-Mailer: PHP/' . phpversion();

    	mail($to, $subject, $message, $headers);*/
    	$email = $this->getEmail();
    	$to      = $this->email;
		$subject = "Global Business Art";
		$message   = $email;
		$Header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$Header .= 'From: Administrator info@globalbusinessart.com' . "\r\n";
		ini_set('SMTP', "relay-hosting.secureserver.net");
		ini_set('smtp_port', "25");
		try{mail($to, $subject, $message, $Header);}catch (Exception $e) {}
    	//echo $email;
	}

	function readEmail() {
		$file = file_get_contents('email.html', FILE_USE_INCLUDE_PATH);
		return $file;
	}

	function getEmail() {
		$str = $this->readEmail();
		$variables = array("name"=>$this->name,"rstring"=>$this->rstring,"serverurl"=>$GLOBALS['url'],"type"=>$this->type);

		foreach($variables as $key => $value){
		    $str = str_replace('{'.strtoupper($key).'}', $value, $str);
		}
		return $str;
	}

	function generateRandomString($length = 15) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function updateAnswerStatus() {
		global $conn;
		$sql = "Update userinfo
					set answerstatus =1 where rstring='".$this->rstring."'";
		$res = $conn->prepare($sql);
		return $res->execute();
	}

	function getTableDump() {
		global $conn;
		$sql = "Select u.name,u.email,u.date_time,u.type as 'leadBy',q.question1,q.question2,q.question3,q.question4 from userinfo u , questionaire q where u.rstring=q.rstring";
		$res = $conn->prepare($sql);
		$res->execute();
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=projectasia-".date('d-M-Y').".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		$fp = fopen('php://output', 'w');
		/*while ($row = $res->fetch(PDO::FETCH_ASSOC))
		{   
			fputcsv($fp,$row);
		}*/
		$row = $res->fetch(PDO::FETCH_ASSOC);
		if ($row) {
		    fputcsv($fp,array_keys($row));
		    while ($row) {
		        fputcsv($fp,array_values($row));
		        $row = $res->fetch(PDO::FETCH_ASSOC);
		    }
		}
	}
}
?>