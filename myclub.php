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
<body onload="getClubDetails()">

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
        <li><a href="player.php">Player profile</a></li>
        <li class="active"><a href="myclub.php">My Club</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/~vermaj/LocalLeague/php/logout.php" id="logoutBtn"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-3 sidenav" id="fixturesList">
      <br/>
      <div class="well">
        <h2><u>Fixtures</u></h2>
        
      
      </div>
      </div>
      <br/>
      <div class="col-sm-9">
        <div class="well text-center" id="adminControls">
          <h3>Admin Controls</h3>
          <div class="col-sm-5">
            <button data-toggle="modal" data-target="#addMatchModal"> Open match modal </button>
          </div>
          <div class="col-sm-1">
            <span> </span>
          </div>
          <div class="col-sm-5">
            <button data-toggle="modal" data-target="#bookModal"> Open book modal </button>
        </div>
      </div>
      <div class="well text-center">
        <a id="linkToTalk"><button class="btn btn-primary btn-group-justified">Go to Team Talk</button></a>
      </div>
      <div class="well text-center">
        <h3 id="clubName"></h3>
        <p id="clubBio"></p>
	    	<p id="clubLocation"></p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well" id="won-well">
            <h4>Won</h4>
            <p id="clubWon"></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="draw-well">
            <h4>Drawn</h4>
            <p id="clubDrawn"></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="lost-well">
            <h4>Lost</h4>
            <p id="clubLost"></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well" id="gd-well">
            <h4>Goal Difference</h4>
            <p id="clubDiff"></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="well text-left">
            <legend class="form-group">Top Goalscorers</legend>
            <p id="gs1"></p> 
            <p id="gs2"></p> 
            <p id="gs3"></p> 
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well text-left">
            <legend class="form-group">Top Assists</legend>
            <p id="as1"></p> 
            <p id="as2"></p> 
            <p id="as3"></p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <h3 class="text-center">The Team</h3>
            <div class="responsive-table text-center">
              <table class="table" id="playerTable">
                <tr>
                  <th>Number</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Goals</th>
                  <th>Assists</th>
                  <th>Yellows</th>
                  <th>Reds</th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="addMatchModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Match/Training </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="addMatchForm" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-2" for="type">Type:</label>
            <div class="col-sm-10">
              <select class="form-control" id="type" name="type">
                <option value="match">Match</option>
                <option value="training">Training</option>
                <option value="social">Social</option>
              </select>
            </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="time">Time:</label>
              <div class="col-sm-10">
                <input class="form-control" type="time" id="time" name="time">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="date">Date:</label>
              <div class="col-sm-10">
                <input class="form-control" type="date" id="date" name="date">
              </div>
            </div>
          <input type="text" id="clubID" class="hide" name="clubID">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="addMatchBtn"><span class="glyphicon glyphicon-plus"></span> Add Match </button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="bookModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Match/Training </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="bookForm" method="POST" action="php/bookPlayer.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="player">Select player:</label>
              <div class="col-sm-10">
                <select class="form-control" id="playerList" name="playerList">

                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="card">Select card:</label>
              <div class="col-sm-10">
                <select class="form-control" id="card" name="card">
                  <option value="yellow">Yellow</option>
                  <option value="red">Red</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-warning" id="bookBtn"><span class="glyphicon glyphicon-plus"></span> Book Player </button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
  </div>
</div>


<input type="text" id="playerID" class="hide" name="playerID">

<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

<script src="js/clubFunctions.js"></script>

</body>
</html>