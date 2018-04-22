<?php
  session_start();
  $userID = $_SESSION['user'];
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
        <li class="active"><a href="index.php">Home</a></li>
        <?php
          if ((isset($_SESSION["user"]) && $_SESSION["user"] == true)){
            echo "
            <li><a href='#'>Search</a></li>
            <li><a href='myclub.php'>My Club</a></li>
            <li><a href='teamtalk.php'>Team Talk</a></li>
            ";
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if ((isset($_SESSION["user"]) && $_SESSION["user"] == true)){
            echo '<li><a href="/~vermaj/LocalLeague/php/logout.php" id="logoutBtn"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
          }
          else{
            echo '<li><a href="#" data-toggle="modal" data-target="#myModal" id="loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
        ?>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
  	  <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/img1.jpeg" alt="Image">
        <div class="carousel-caption">
          <h3>Your club</h3>
	      	  <p>Update your scores | Schedule your fixtures |  Manage your players</p>
        </div>      
      </div>

      <div class="item">
        <img src="img/img2.jpeg" alt="Image">
        <div class="carousel-caption">
          <h3>Search</h3>
		  <p>Find players for your club | Find a club to play for</p>
        </div>      
      </div>
	  
	  <div class="item">
        <img src="img/img3.jpeg" alt="Image">
        <div class="carousel-caption">
          <h3>Communicate</h3>
		  <p>Talk to your team | Report injuries</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login <span class="glyphicon glyphicon-user" aria-hidden="true"></span></h4>
      </div>
      <div class="modal-body">
        <p>Please enter your login details here:</p>
        <form method="POST" id="loginForm">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="modal-footer">
            <p>Not signed up yet? <a href="signup.php"><u>Create an account here </u></a></p>
            <p><a href="#"><u>Forgot password?</u></a></p>
            <button type="submit" class="btn btn-success" id="loginBtn">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>


<script src="js/ajax.js"></script>
</body>
</html>