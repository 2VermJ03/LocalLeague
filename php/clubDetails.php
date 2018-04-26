<?php

session_start();
header("Content-type: application/json");
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");

$userID = $_GET["userID"];

$result = $conn->query("SELECT * FROM ll_players WHERE userID = $userID");
$row = $result->fetchAll(PDO::FETCH_ASSOC);
if($row){
    $clubID = $row[0]["clubID"];
    $getClubDetails = $conn->query("SELECT * FROM ll_clubs WHERE clubID = $clubID");
    $rows = $getClubDetails->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);
}
?>