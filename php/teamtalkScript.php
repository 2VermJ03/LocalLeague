<?php
session_start();
header("Content-type: application/json");

$clubID = $_GET["clubID"];
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$statement = $conn->query("SELECT ll_teamtalk.playerID, msg, firstName, lastName FROM `ll_teamtalk` INNER JOIN `ll_players` ON ll_teamtalk.clubID = ll_players.clubID AND ll_teamtalk.playerID = ll_players.playerID WHERE ll_teamtalk.clubID = $clubID");
$row=$statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($row);
?>