<?php
require "connect.php"; // Include your database connection code

// Check if faculty_id is provided via POST
if (isset($_POST['faculty_id'])) {
    $facultyId = $_POST['faculty_id'];

    // SQL query to delete the admin record
    $sql = "DELETE FROM campus_admin WHERE faculty_id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $facultyId);

    if ($stmt->execute()) {
        $response = ["success" => "Admin deleted successfully"];
    } else {
        $response = ["error" => "Error deleting admin: " . $stmt->error];
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $response = ["error" => "Invalid request"];
}

// Return a JSON response
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection
$con->close();
?>
