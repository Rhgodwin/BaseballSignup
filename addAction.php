<?php
session_start();
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: logout.php');
    exit;

} ?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("newDBconnect.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['playername']);
	$team = mysqli_real_escape_string($mysqli, $_POST['team']);
	$position = mysqli_real_escape_string($mysqli, $_POST['position']);
		
	// Check for empty fields
	if (empty($name) || empty($team) || empty($position)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($team)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($position)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO players (`playername`, `team`, `position`) VALUES ('$name', '$team', '$position')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>