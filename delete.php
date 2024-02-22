<?php


session_start();
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: logout.php');
    exit;

}
// Include the database connection file
require_once("newDBconnect.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM players WHERE id = $id");

// Redirect to the main display page 
header("Location:admin.php");