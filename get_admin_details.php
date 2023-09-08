<?php
require "connect.php"; // Include your database connection script

// Get the admin ID from the AJAX request
$facultyId = $_POST['facultyId'];   

// Query the database to retrieve admin details based on the admin ID
$sql = "SELECT * FROM campus_admin WHERE faculty_id = $facultyId"; // Replace with your table name and structure

$result = $con->query($sql);

if ($result->num_rows > 0) {
    $facultyData = $result->fetch_assoc();
    echo json_encode($facultyData); // Send admin data as JSON response
} else {
    echo json_encode(['error' => 'Admin not found']);
}
?>