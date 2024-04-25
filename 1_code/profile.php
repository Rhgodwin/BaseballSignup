<?php
// session start
session_start();
$_SESSION['last_page'] = 'profile.php';
// Validation for user is logged in
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'dataman';
$DATABASE_PASS = 'data';
$DATABASE_NAME = 'pwdb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// no passwd in $session so get it from db
$stmt = $con->prepare('SELECT id, username, email FROM accounts WHERE id = ?');

// Use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($id,$username, $email);
$stmt->fetch();
$stmt->close();
$stmt2 = $con->prepare("SELECT `team` , `position` FROM `players` WHERE `playername` = '$username'");
$stmt2->execute();
$stmt2->bind_result($team,$position);
$stmt2->fetch();
$stmt2->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Innovative Soulutions Corportation</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$username?></td>
					</tr>
					
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Current Team:</td>
						<td><?=$team?></td>
					</tr>
						<tr>
							<td>Current Position:</td>
							<td><?=$position?></td>

				</table>
			</div>
		</div>
		<a href="home.php" style="font-size:24px;">Return Home</a><br>
		<a href="editAcct.php?id=<?php echo $id; ?>" Style="font-size:24px;">Change Account Settings</a>
	</body>
</html>