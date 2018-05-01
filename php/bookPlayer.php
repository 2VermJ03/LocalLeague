<?php
session_start();
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");

$playerID = filter_var($_POST["playerList"], FILTER_SANITIZE_NUMBER_INT);
$clubID = $_POST["clubID"];
$card = $_POST["card"];

if($card == "yellow"){
    $results = $conn->query("UPDATE ll_players SET yellow = yellow + 1 WHERE playerID = $playerID");
}
elseif($card == "red"){
    $results = $conn->query("UPDATE ll_players SET red = red + 1 WHERE playerID = $playerID");
}

echo "SUCCESS";

?>