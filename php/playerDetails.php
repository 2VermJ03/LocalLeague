<?php
session_start();
header("Content-type: application/json");

$playerID = $_GET["playerID"];
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$statement = $conn->query("SELECT * FROM ll_players WHERE playerID = $playerID");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);
?>