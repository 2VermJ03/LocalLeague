<?php
session_start();

$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$type = $_POST["type"];

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
		
		echo "SUCCESS";
	}
}	


















?>