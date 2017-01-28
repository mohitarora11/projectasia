<?php

	include_once("db_connection.php");

	class questionaire {
		var $id,$rstring,$q1,$q2,$q3,$q4;
		function updateQuestionaire(){
			global $conn;
			$sql = "Update questionaire
					set question1 ='".$this->q1."',question2='".$this->q2."',question3='".$this->q3."',question4='".$this->q4."' where rstring='".$this->rstring."'";
			
			$res = $conn->prepare($sql);

			return $res->execute();
		}

		function createQuestionaire() {
			global $conn;
			$sql = "Insert into questionaire(rstring) VALUES('".$this->rstring."')";
			$res = $conn->prepare($sql);
			$res->execute();
		}

		function deleteQuestion() {
			global $conn;
			$sql = "delete from questionaire where rstring = '".$this->rstring."'";
			$res = $conn->prepare($sql);
			return $res->execute();
		}

		function getQuestionaire() {
			global $conn;
			$sql = "Select question1, question2, question3, question4 from questionaire where rstring='".$this->rstring."'";
			$res = $conn->prepare($sql);
			$res->execute();
			return $res->fetchAll();
		}
	}
?>