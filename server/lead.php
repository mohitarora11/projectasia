<?php
include_once("global_var.php");
include_once("queries.php");
include_once("questionaire.php");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest") {
	if( isset( $_REQUEST["id"] ) ) {
		$user = new newuser();
		$question = new questionaire();
		$k=false;
		switch($_REQUEST["id"]){
			case "save":
				try {					
					$user->name = $_REQUEST["fName"];
					$user->email = $_REQUEST["email"];
					$user->mobile = $_REQUEST["mobile"];
					$user->type = $_REQUEST["type"];
					$user->rstring = $user->generateRandomString();
					$k = $user->createNewUser();					
					$rtn['res']=$k;
					
					$question->rstring = $user->rstring;
					$question->createQuestionaire();
					$user->sendEmail();
				}catch (Exception $e) {
					$rtn['error']=$e;
					$rtn['res']=false;
				}
				break;
			case 'delete':
				$user->rstring = $_REQUEST["userid"];
				$k = $user->deleteUser(); 
				$rtn['res']=$k;
				$question->rstring = $user->rstring;
				$question->deleteQuestion();
				break;

			case 'getQuestionaire':	
				try {
					$question->rstring = $_REQUEST["userid"];
					$k=$question->getQuestionaire();
					$rtn['res']=$k;
				}catch (Exception $e) {
					$rtn['error']=$e;
					$rtn['res']=false;
				}
				break;
		}
		
		header('Content-Type:application/json');
		echo json_encode($rtn);
	}
}