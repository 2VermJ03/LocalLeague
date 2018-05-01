<?php
session_start();
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");

$date = date('dmY', strtotime($_POST['date']));
$time = $_POST["time"];
$type = $_POST["type"];
$clubID = $_POST["clubID"];

$addmatch = $conn->prepare("INSERT INTO ll_match (date, time, type, clubID) VALUES (?,?,?,?)");

$addmatch -> bindParam(1, $date);
$addmatch -> bindParam(2, $time);
$addmatch -> bindParam(3, $type);
$addmatch -> bindParam(4, $clubID);

$addmatch -> execute();

echo "SUCCESS";

?>