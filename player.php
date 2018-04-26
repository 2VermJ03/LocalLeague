<?php
  session_start();
  if ((isset($_SESSION["user"]) && $_SESSION["user"] == true)){
    echo "<p id='userID' class='hide'>" . $_SESSION['user'] . "</p>";
  }
  else{
    header("Location: /~vermaj/LocalLeague/index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LocalLeague</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/stylesheet.css?v=1.0">
  
  
</head>
<body onload="getPlayerDetails()">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
	    	<span class="icon-bar"></span>  		
      </button>
      <a class="navbar-brand" href="index.php">LocalLeague</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="player.php">Player profile</a></li>
        <li><a href="myclub.php">My Club</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/~vermaj/LocalLeague/php/logout.php" id="logoutBtn"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center" id="playerDiv">
  <div class="row content">
    <div class="col-sm-3">
			<span> </span>
		</div>
    <div class="col-sm-6 text-center well">
			<h1 class="well"> Player Profile </h1>
        <div class="responsive-table">
          <table id="playerTable" class="table">
            <tr>
              <th>First Name: </th>
              <td id="firstName"> </td>
            </tr>
            <tr>
              <th>Last Name: </th>
              <td id="lastName"> </td>
            </tr>
            <tr>
              <th> Date of Birth: </th>
              <td id="dob"> </td>
            </tr>
            <tr>
              <th>Bio: </th>
              <td id="bio"> </td>
            </tr>
            <tr>
              <th>Position: </th>
              <td id="pos"> </td>
            </tr>
            <tr>
              <th>Kit Number: </th>
              <td id="kit"> </td>
            </tr>
            <tr>
              <th>Goals: </th>
              <td id="goals"> </td>
            </tr>
            <tr>
              <th>Assists: </th>
              <td id="assists"> </td>
            </tr>
            <tr>
              <th>Yellow Cards: </th>
              <td id="yellows"> </td>
            </tr>
            <tr>
              <th>Red Cards: </th>
              <td id="reds"> </td>
            </tr>
          </table>
        </div>
		</div>
  </div>
</div>









<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

<script src="js/playerProfile.js"></script>

</body>
</html>