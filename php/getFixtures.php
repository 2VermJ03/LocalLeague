<?php
session_start();
header("Content-type: application/json");
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$clubID = $_GET["clubID"];
$statement = $conn->query("SELECT * FROM ll_match WHERE clubID = $clubID");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
?>