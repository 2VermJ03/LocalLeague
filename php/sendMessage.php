<?php
session_start();

$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$msg = $_POST["msg"];
$playerID = $_POST["playerID"];
$clubID = $_POST["clubID"];

if(empty($msg)){
    echo "ENTER_MSG";
}
elseif(empty($playerID)){
    echo "ENTER_PID";
}
elseif(empty($clubID)){
    echo "ENTER_CID";
}
else{
    $add = $conn->prepare("INSERT INTO ll_teamtalk (msg, playerID, clubID) VALUES (?,?,?)");
    $add -> bindParam(1, $msg);
    $add -> bindParam(2, $playerID);
    $add -> bindParam(3, $clubID);
    $add -> execute();
    
    
    echo "SUCCESS";
    
    
}

?>