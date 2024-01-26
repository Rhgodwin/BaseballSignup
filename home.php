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
	
		 <input type="checkbox" name="jaguars" value="jaguars" id="jaguars">
		 <label for="jaguars" class="fs">Jaguars</label><br>
		
		 <input type="checkbox" name="cougars" value="cougars" id="jaguars" >
		 <label for="jaguars" class="fs">Cougars</label><br>

		 <div style="display: inline-block;">
		 <input type="checkbox" name="reds" value="reds" id="reds" >
		 <label for="reds" class="fs">Reds</label><br>
	
		 <input type="checkbox" name="cubs" value="cubs" id="cubs" >
		 <label for="cubs" class="fs">Cubs</label><br>
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