<?php
session_start();
header("Content-type: application/json");

$clubID = $_GET["clubID"];
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$statement = $conn->query("SELECT firstName, lastName, assists FROM ll_players WHERE clubID = $clubID ORDER BY assists DESC LIMIT 3");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);
?>