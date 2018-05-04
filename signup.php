<!DOCTYPE html>
<html lang="en">
<head>
  <title>LocalLeague</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/stylesheet.css?v=1.0">
</head>
<body onload="getClubs()">

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
			<form class="form-horizontal" method="POST" id="signUpForm">
		  	<div class="form-group">
				  <label class="control-label col-sm-2" for="playerFirstName">First Name:</label>
				  <div class="col-sm-10">
            <input id="playerFirstName" type="text" class="form-control" name="playerFirstName" placeholder="First Name" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="playerLastName">Last Name:</label>
				  <div class="col-sm-10">
            <input id="playerLastName" type="text" class="form-control" name="playerLastName" placeholder="Last Name" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
				  <div class="col-sm-10">
            <input id="dob" type="date" class="form-control" name="dob" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="bio">Bio:</label>
				  <div class="col-sm-10">
            <input type="text" id="bio" class="form-control" name="bio" placeholder="Write something about yourself..." required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="position">Position:</label>
				  <div class="col-sm-10">
						<select class="form-control" id="position" name="position" required>
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
            <input id="kit" type="number" class="form-control" name="kit" min="1" max="99" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="password">Password:</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="confirmPassword">Confirm Password:</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control" id="confirmPassword" placeholder="Enter password again" name="confirmPassword" required>
				  </div>
				</div>
				<div class="radio form-group">
				  <label class="control-label col-sm-2" for="type"><b>Type: </b></label>
					<label for="manager"><input type="radio" name="type" value="manager" id="manager">Manager</label>
					<label for="player"><input type="radio" name="type" value="player" id="player">Player</label>
				</div>
				<br/>
				<div id="joinClubDiv">
					<div class="form-group">
						<label class="control-label col-sm-2" for="position">Find your club:</label>
						<div class="col-sm-10 responsive-table">
							<table id="clubList">

							</table>
						</div>
					</div>
				</div>
				<div id="createClubDiv">
					<div class="form-group">
						<label class="control-label col-sm-2" for="clubName">Club Name:</label>
						<div class="col-sm-10">
							<input id="clubName" type="text" class="form-control" name="clubName" placeholder="Club Name">
						</div>
					</div>
					<div class="form-group">
				    <label class="control-label col-sm-2" for="city">City:</label>
						<div class="col-sm-10">
							<input id="city" type="text" class="form-control" name="city" placeholder="City">
						</div>
			  	</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="county">County:</label>
						<div class="col-sm-10">
							<input id="county" type="text" class="form-control" name="county" placeholder="County">
						</div>
				  </div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="clubBio">Club Bio:</label>
						<div class="col-sm-10">
							<input id="clubBio" type="text" class="form-control" name="clubBio" placeholder="Write something about your club...">
						</div>
					</div>
				</div>
			  <button type="submit" class="btn btn-success" id="signUpSubmit">Submit</button>
			</form>
		</div>
	</div>
</div>



<footer class="container-fluid text-center">
  <p>Jay Verma | Q12027103</p>
</footer>

<script src="js/signup.js"></script>

</body>
</html>