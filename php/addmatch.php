<?php
session_start();
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");

$date = date('dmY', strtotime($_POST['date']));
$time = $_POST["time"];
$type = $_POST["type"];

$addmatch = $conn->prepare("INSERT INTO ll_match (date, time, type) VALUES (?,?,?)");

$addmatch -> bindParam(1, $date);
$addmatch -> bindParam(2, $time);
$addmatch -> bindParam(3, $type);

$addmatch -> execute();

$qry = $conn->query("SELECT * FROM ll_match");
$stmt = $qry->fetch();

if($stmt){
	while($stmt){

		echo "$stmt[date]";
		echo "$stmt[time]";
		echo "$stmt[type]";		
		$stmt = $qry->fetch();

	}
}

?>