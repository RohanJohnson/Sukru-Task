<?php
require "includes/init.php";

$host = "localhost";
$username = "username";
$password = "password";
$database = "database";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";