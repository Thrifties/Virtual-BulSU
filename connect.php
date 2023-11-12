<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "virtual_bulsu_db";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error); // Handle the error appropriately
}

?>
