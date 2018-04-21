<?php
/*
	Jay Verma
	Q12027103
	PHP login script
*/
session_start();

$email = $_POST["email"];
$pWord = $_POST["password"];

$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$results = $conn->query("SELECT * FROM ll_users where email='$email' AND pword='$pWord'");
$row=$results->fetch();
if($row){
	$user = $row['userID'];
	$_SESSION['user'] = $user;
	echo "SUCCESS";

}
else{
	echo "USERNAME_OR_PASSWORD_INCORRECT";
}


	


?>