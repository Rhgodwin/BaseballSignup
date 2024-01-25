<?php
//logout code to destroy the session and return to main page
session_start();
session_destroy();
//redirect to login
header('location: index.html');