<?php


session_start();
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: logout.php');
    exit;

}

// Include the database connection file
require_once("newDBconnect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Check for empty fields
	if (empty($name) || empty($password) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE accounts SET `username` = '$name', `password` = '$password', `email` = '$email' WHERE `id` = $id");
		
		// Display success message

		if (isset($_SESSION['last_page']) && $_SESSION['last_page'] == 'admin.php') {
			echo "<p style='color: green;'>Data updated successfully!</p>";
			echo "<a href='admin.php'>View Result</a>";
		}  else if(isset($_SESSION['last_page']) && $_SESSION['last_page'] == 'profile.php'){
			echo "<p style='color: green;'>Data updated successfully!</p>";
			echo "<a href='profile.php'>View Result</a>";
		}
		}
		}