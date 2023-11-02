<?php

$servername = "localhost";
$username = "u156823415_virtual_bulsu";
$password = "Virtual_BulSU_2023";
$dbname = "u156823415_virtual_bulsu";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error); // Handle the error appropriately
}

?>
