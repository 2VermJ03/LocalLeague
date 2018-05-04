<?php
  session_start();
  if ((isset($_SESSION["user"]) && $_SESSION["user"] == true)){
    echo "<input type='text' class='hide' name='userID' id='userID' value='" . $_SESSION['user'] . "'>";
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
<body onload="getMessages()">

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
        <li><a href="player.php">Player Profile</a></li>
        <li><a href="myclub.php">My Club</a></li>
        <li class="active"><a href="#">Team Talk</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/~vermaj/LocalLeague/php/logout.php" id="logoutBtn"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center" id="teamtalkDiv">
  <div class="row content">
    <div class="col-sm-3">
      <span> </span>
    </div>
    <div class="col-sm-6 text-center well">
      <h1 class="well"> Team Talk </h1>
      <button class="btn btn-primary btn-group-justified" id="updateMsgBtn">Update</button>
      <div class="well" id="messageDiv">
        <div class="table-responsive">
          <table id="outputTable" class="table">

          </table>
        </div>
      </div>
      <div class="well">
        <form id="msgForm">
          <?php
            $clubID = $_GET["clubID"];
            echo "<input id='clubID' class='hide' name='clubID' type='number' value='" . $clubID .  "'>";
          ?>
          <input class='hide' id='playerID' name='playerID' type='number'>
          <input id="msg" type="text" class="form-control" name="msg" placeholder="Write message here...">
          <button type="submit" class="btn btn-primary btn-group-justified" id="sendMsgBtn">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>






<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

<script src="js/teamtalkFunctions.js"></script>

</body>
</html>