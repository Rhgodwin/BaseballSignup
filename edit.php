<?php
// Include the database connection file
require_once("newDBconnect.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM players WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['playername'];
$team = $resultData['team'];
$position = $resultData['position'];
?>
<html>
<head>	
	<title>Edit Data</title>
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="admin.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr> 
				<td>Team</td>
				<td><input type="text" name="team" value="<?php echo $team; ?>"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position" value="<?php echo $position; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>