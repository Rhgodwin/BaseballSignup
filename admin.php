<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || !isset($_SESSION['isAdmin']) !== TRUE ) {
    header('Location: index.html');
    exit;

}

?>
<!DOCTYPE HTML>
<html>
    <head><title>admin page</title>
    <h1>admin</h1>
    </head>
</body>
</html>
