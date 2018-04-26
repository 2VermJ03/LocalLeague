<?php
session_start();

$conn = new PDO("mysql:host=localhost; dbname=vermaj", "vermaj", "oonifeho");
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$type = $_POST["type"];
$firstName = $_POST["playerFirstName"];
$lastName = $_POST["playerLastName"];
$dob = date('dmY', strtotime($_POST['dob']));
$bio = $_POST["bio"];
$pos = $_POST["position"];
$kit = $_POST["kit"];
$goals = 0;
$assists = 0;
$yellow = 0;
$red = 0;
$clubID = $_POST["clubID"];
$clubName = $_POST["clubName"];
$city = $_POST["city"];
$county = $_POST["county"];
$clubBio = $_POST["clubBio"];
$won = 0;
$drawn = 0;
$lost = 0;
$scored = 0;
$conceded = 0;
$played = 0;
$gd = 0;
$points = 0;

$result = $conn->query("SELECT email FROM ll_users WHERE email='$email'");
$row = $result->fetch();
if($row){
	echo "USER_EXISTS";
}
else{
	if(empty($email)){
		echo "ENTER_EMAIL";
	}
	elseif(empty($password)){
		echo "ENTER_PASSWORD";
	}
	elseif(empty($confirmPassword)){
		echo "ENTER_CONFIRM_PASSWORD";
	}
	elseif($password != $confirmPassword){
		echo "PASSWORDS_DO_NOT_MATCH";
	}
	elseif(empty($firstName)){
		echo "ENTER_FIRST_NAME";
	}
	elseif(empty($lastName)){
		echo "ENTER_LAST_NAME";
	}
	elseif(empty($bio)){
		echo "ENTER_BIO";
	}
	elseif(empty($dob)){
		echo "ENTER_DOB";
	}
	elseif(empty($bio)){
		echo "ENTER_BIO";
	}
	elseif(empty($pos)){
		echo "ENTER_POS";
	}
	elseif(empty($kit)){
		echo "ENTER_KIT";
	}
	else{
		$add = $conn->prepare("INSERT INTO ll_users (email, pword, manager) VALUES (?,?,?)");
	
		$add -> bindParam(1, $email);
		$add -> bindParam(2, $password);
		$add -> bindParam(3, $type);
		$add -> execute();
		
		$getID = $conn->lastInsertId();

		$statement = $conn->prepare("INSERT INTO ll_players (firstName, lastName, dob, bio, position, kit, userID, goals, assists, yellow, red) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

		$statement -> bindParam(1, $firstName);
		$statement -> bindParam(2, $lastName);
		$statement -> bindParam(3, $dob);
		$statement -> bindParam(4, $bio);
		$statement -> bindParam(5, $pos);
		$statement -> bindParam(6, $kit);
		$statement -> bindParam(7, $getID);
		$statement -> bindParam(8, $goals);
		$statement -> bindParam(9, $assists);
		$statement -> bindParam(10, $yellow);
		$statement -> bindParam(11, $red);

		$statement -> execute();

		$playerID = $conn->lastInsertId();

		if($type == 0){

			$clubPlayerInsert = $conn->prepare("INSERT INTO ll_clubPlayers (clubID, playerID) VALUES (?,?)");

			$clubPlayerInsert -> bindParam(1, $clubID);
			$clubPlayerInsert -> bindParam(2, $playerID);
	
			$clubPlayerInsert -> execute();
	
			echo "PLAYER_CREATED_CLUB_JOINED";
		}
		elseif($type == 1){
			if(empty($clubName)){
				echo "ENTER_CLUB_NAME";
			}
			elseif(empty($city)){
				echo "ENTER_CITY";
			}
			elseif(empty($county)){
				echo "ENTER_COUNTY";
			}
			elseif(empty($clubBio)){
				echo "ENTER_CLUB_BIO";
			}
			else{
				$createClub = $conn->prepare("INSERT INTO ll_clubs (clubName, city, county, clubBio, won, drawn, lost, scored, conceded, played, gd, points, manager) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

				$createClub -> bindParam(1, $clubName);
				$createClub -> bindParam(2, $city);
				$createClub -> bindParam(3, $county);
				$createClub -> bindParam(4, $clubBio);
				$createClub -> bindParam(5, $won);
				$createClub -> bindParam(6, $drawn);
				$createClub -> bindParam(7, $lost);
				$createClub -> bindParam(8, $scored);
				$createClub -> bindParam(9, $conceded);
				$createClub -> bindParam(10, $played);
				$createClub -> bindParam(11, $gd);
				$createClub -> bindParam(12, $points);
				$createClub -> bindParam(13, $getID);
	
				$createClub -> execute();
				
				$clubID = $conn->lastInsertId();
	
				$clubPlayerInsert = $conn->prepare("INSERT INTO ll_clubPlayers (clubID, playerID) VALUES (?,?)");
	
				$clubPlayerInsert -> bindParam(1, $clubID);
				$clubPlayerInsert -> bindParam(2, $playerID);
		
				$clubPlayerInsert -> execute();
	
				echo "PLAYER_AND_CLUB_CREATED";
			}
		}
	}
}	

?>