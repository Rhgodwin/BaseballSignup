<?php
// Session start
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Annual Baseball Tech Tourney Signup Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Innovative Soulutions Corporation</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Annual Baseball Tech Tourney Signup Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>! Ready to play some baseball?</p>
		<h2 style="text-align: center;">What team and position are you interested in?</h2>
		<div class="fs1">
		<fieldset class="fieldset1">
         <legend><b></b>Team Selection:</b></legend>
	
		 <input type="checkbox" name="Team1" value="1" id="team1">
		 <label for="Team1" class="fs">Team 1</label><br>
		
		 <input type="checkbox" name="leftfield" value="leftfield" id="leftfield" >
		 <label for="leftfield" class="fs">Team 2</label><br>

		 <div style="display: inline-block;">
		 <input type="checkbox" name="Team3" value="1" id="team3" >
		 <label for="Team1" class="fs">Team 3</label><br>
	
		 <input type="checkbox" name="Team4" value="1" id="team4" >
		 <label for="Team4" class="fs">Team 4</label><br>
		 </fieldset>
		</div>
		<fieldset>

		</fieldset>
		<div id = "buttondiv">
			<input type="submit" id="submit" name="submit" value="Sign Up">
			</div>

	</div>

		
	</body>
</html>