<?php
session_start();
header("Content-type: application/json");
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$userID = $_GET["userID"];
$statement = $conn->query("SELECT * FROM ll_players WHERE userID = $userID");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
?>