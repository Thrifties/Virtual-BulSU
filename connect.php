<?php

$servername = "localhost";
$username = "u673355866_vbulsu";
$password = "a9FU@1F92efadsad";
$dbname = "u673355866_vbulsu";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error); // Handle the error appropriately
}

?>
