<?php
session_start();
$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$userID = $_SESSION["user"];
$pfn = $_POST["playerFirstName"];
$pln = $_POST["playerLastName"];
$dob = date('dmY', strtotime($_POST['dob']));
$bio = $_POST["bio"];
$pos = $_POST["position"];
$kit = $_POST["kit"];

$result = $conn->query("SELECT * FROM ll_players WHERE userID='$userID'");
$row = $result->fetch();
if($row){
    echo "PLAYER_ALREADY_CREATED";
}
else{
    if(empty($pfn)){
        echo "ENTER_FIRST_NAME";
    }
    elseif(empty($pln)){
        echo "ENTER_LAST_NAME";
    }
    elseif(empty($dob)){
        echo "ENTER_DOB";
    }
    elseif(empty($bio)){
        echo "ENTER_BIO";
    }
    elseif(empty($pos)){
        echo "ENTER_POSITION";
    }
    elseif(empty($kit)){
        echo "ENTER_KIT";
    }
    else{
        $add = $conn->prepare("INSERT INTO ll_players (firstName, lastName, dob, bio, position, kit, userID) VALUES (?,?,?,?,?,?,?)");
	
		$add -> bindParam(1, $pfn);
		$add -> bindParam(2, $pln);
        $add -> bindParam(3, $dob);
        $add -> bindParam(4, $bio);
        $add -> bindParam(5, $pos);
        $add -> bindParam(6, $kit);
        $add -> bindParam(7, $userID);
		$add -> execute();

		echo "SUCCESS";
    }
}












?>