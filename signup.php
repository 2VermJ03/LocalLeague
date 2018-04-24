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
  <script src="js/ajax.js"></script>
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid text-center" id="signUpDiv">
	<div class="row content">
	  <div class="col-sm-1">
				<span> </span>
	  </div>
		<div class="col-sm-10 text-center well">
			<h1> Sign up </h1>
			<form class="form-horizontal" action="php/signup.php" method="POST">
		  	<div class="form-group">
				  <label class="control-label col-sm-2" for="playerFirstName">First Name:</label>
				  <div class="col-sm-10">
            <input id="playerFirstName" type="text" class="form-control" name="playerFirstName" placeholder="First Name">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="playerLastName">Last Name:</label>
				  <div class="col-sm-10">
            <input id="playerLastName" type="text" class="form-control" name="playerLastName" placeholder="Last Name">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
				  <div class="col-sm-10">
            <input id="dob" type="date" class="form-control" name="dob">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="bio">Bio:</label>
				  <div class="col-sm-10">
            <input id="bio" class="form-control" name="bio" placeholder="Write something about yourself...">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="position">Position:</label>
				  <div class="col-sm-10">
						<select class="form-control" id="position" name="position">
							<option value="ATK">Attack</option>
							<option value="MID">Midfield</option>
							<option value="DEF">Defense</option>
							<option value="GK">Goalkeeper</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="kit">Kit Number:</label>
				  <div class="col-sm-10">
            <input id="kit" type="number" class="form-control" name="kit" min="1" max="99">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="password">Password:</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="confirmPassword">Confirm Password:</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control" id="confirmPassword" placeholder="Enter password again" name="confirmPassword">
				  </div>
				</div>
				<div class="radio form-group">
					<label><input type="radio" name="type" value="1">Manager</label>
					<label><input type="radio" name="type" value="0">Player</label>
				</div>
				<br/>
			  <button type="submit" class="btn btn-success" id="signUpSubmit">Submit</button>
			</form>
		</div>
		<div class="col-sm-3">
			<span> </span>
		</div>
	</div>
</div>




<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

</body>
</html>