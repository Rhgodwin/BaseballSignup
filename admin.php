<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: index.html');
    exit;

}
require_once('newDBconnect.php');
// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM players");
?>

<html>
<head>	
	<title>Database Admin</title>
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
</head>

<body>
	<nav class="navtop">
	<h2 style="color:white;font-size:50px;">Database Admin Page</h2>
	<p>
</nav>
	<a href="add.php">Add New Data</a>
		<a href="index.html">Logout</a>
	</p>

	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Name</strong></td>
			<td><strong>Team</strong></td>
			<td><strong>Position</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['playername']."</td>";
			echo "<td>".$res['team']."</td>";
			echo "<td>".$res['position']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
		 	<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>
</html>
