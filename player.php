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
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>  
	    	<span class="icon-bar"></span>  		
      </button>
      <a class="navbar-brand" href="index.php">LocalLeague</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="myclub.php">My Club</a></li>
        <li><a href="#">Team Talk</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="player.php">Player profile</a></li>
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
			<form class="form-horizontal" action="" method="POST">
        <div class="input-group">
          <span class="input-group-addon col-sm-3">First Name:</span>
          <input id="playerFirstName" type="text" class="form-control" name="playerFirstName" placeholder="First Name">
        </div>
        <div class="input-group">
          <span class="input-group-addon col-sm-3">Last Name:</span>
          <input id="playerLastName" type="text" class="form-control" name="playerLastName" placeholder="Last Name">
        </div>
        <div class="input-group">
          <span class="input-group-addon col-sm-3">Date of Birth:</span>
          <input id="dob" type="date" class="form-control" name="dob">
        </div>
        <div class="input-group">
          <span class="input-group-addon col-sm-3">Bio:</span>
          <textarea id="bio" class="form-control" name="bio" rows="1" placeholder="Write something about yourself..."></textarea>
        </div>
        <div class="input-group">
          <span class="input-group-addon col-sm-3">Position:</span>
          <select class="form-control" id="position" name="position">
            <option value="ATK">Attack</option>
            <option value="MID">Midfield</option>
            <option value="DEF">Defense</option>
            <option value="GK">Goalkeeper</option>
          </select>
        </div>
        <div class="input-group">
          <span class="input-group-addon col-sm-3">Kit Number:</span>
          <input id="number" type="number" class="form-control" name="number">
        </div>
        <button type="submit" class="btn btn-success" id="createPlayerBtn">Submit</button>
      </form>
		</div>
  </div>
</div>









<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

<script src="js/ajax.js"></script>

</body>
</html>