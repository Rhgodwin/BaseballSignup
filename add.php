<?php
session_start();
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: logout.php');
    exit;

} ?>
<html>
<head>
	<title>Add Data</title>
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<h2>Add Data</h2>
	<h2>MUST UPDATE ALL FIELDS</h2>
	<p>
		<a href="admin.php">Home</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Player Name</td>
				<td><input type="text" name="playername"></td>
			</tr>
			<tr> 
				<td>Team</td>
				<td><input type="text" name="team"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>