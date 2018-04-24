<?php
session_start();

$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$type = $_POST["type"];
$firstName = $_POST["playerFirstName"];
$lastName = $_POST["playerLastName"];
$dob = date('dmY', strtotime($_POST['dob']));
$bio = $_POST["bio"];
$pos = $_POST["position"];
$kit = $_POST["kit"];

$result = $conn->query("SELECT email FROM ll_users WHERE email='$email'");
$row = $result->fetch();
if($row){
	echo "USER_EXISTS";
}
else{
	if(empty($email)){
		echo "ENTER_EMAIL";
	}
	elseif(empty($password)){
		echo "ENTER_PASSWORD";
	}
	elseif(empty($confirmPassword)){
		echo "ENTER_CONFIRM_PASSWORD";
	}
	elseif($password != $confirmPassword){
		echo "PASSWORDS_DO_NOT_MATCH";
	}
	else{
		$add = $conn->prepare("INSERT INTO ll_users (email, pword, manager) VALUES (?,?,?)");
	
		$add -> bindParam(1, $email);
		$add -> bindParam(2, $password);
		$add -> bindParam(3, $type);
		$add -> execute();
		
		$getID = $conn->lastInsertId();

		$statement = $conn->prepare("INSERT INTO ll_players (firstName, lastName, dob, bio, position, kit, userID) VALUES (?,?,?,?,?,?,?)");

		$statement -> bindParam(1, $firstName);
		$statement -> bindParam(2, $lastName);
		$statement -> bindParam(3, $dob);
		$statement -> bindParam(4, $bio);
		$statement -> bindParam(5, $pos);
		$statement -> bindParam(6, $kit);
		$statement -> bindParam(7, $getID);
		
		$statement -> execute();

		echo "SUCCESS";
	}
}	


















?>