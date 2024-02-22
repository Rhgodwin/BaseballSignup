<?php

session_start();
require_once("dbConnect.php");
// Connection ifno

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'dataman';
$DATABASE_PASS = 'data';
$DATABASE_NAME = 'pwdb';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If failure to connect display error
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}




// check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement to prevent SQL injection attacks.
if ($stmt = $con->prepare('SELECT id, password, isAdmin FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so the result to see if it is in database
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $isAdmin);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: WARNING using plain passwords for ease of use. In future you hashed valued
        if ($_POST['password'] === $password) {
            // Success! User has logged-in!
            // Create sessions, so we know the user is logged in. Think of session like a cookie. 
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            if ($isAdmin){
            header('location: admin.php');
        } else {

            header('location: home.php');
        }
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();

   
}
