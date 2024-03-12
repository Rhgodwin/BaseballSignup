<?php

$databaseHost = 'localhost';
$databaseName = 'pwdb';
$databaseUsername = 'dataman';
$databasePassword = 'data';

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);