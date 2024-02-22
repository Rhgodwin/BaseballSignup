<?php
// Include the database connection file
require_once("newDBconnect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['team']);
	$email = mysqli_real_escape_string($mysqli, $_POST['position']);	
	
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
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE players SET `playername` = '$name', `team` = '$team', `position` = '$position' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}