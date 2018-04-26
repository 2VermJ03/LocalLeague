<?php
session_start();
header("Content-type: application/json");

$clubID = $_GET["clubID"];
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$statement = $conn->query("SELECT * FROM ll_players WHERE clubID = $clubID");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);
?>