<?php
// Include your database connection file (connect.php)
require "connect.php";

// Check if announcementId is set in the POST request
if (isset($_POST['announcementId'])) {
    $announcementId = $_POST['announcementId'];

    // Prepare and execute the DELETE query
    $deleteQuery = "DELETE FROM announcements WHERE announcement_id = ?";
    $stmt = mysqli_prepare($con, $deleteQuery);

    if ($stmt === false) {
        // Handle the error appropriately (e.g., log it or show an error message)
        $response = array("error" => "Delete query preparation failed.");
    } else {
        mysqli_stmt_bind_param($stmt, "i", $announcementId);

        if (mysqli_stmt_execute($stmt)) {
            // Deletion successful
            $response = array("success" => "Announcement deleted successfully.");
        } else {
            // Handle the deletion failure (e.g., log it or show an error message)
            $response = array("error" => "Announcement deletion failed.");
        }

        mysqli_stmt_close($stmt);
    }
} else {
    // If announcementId is not set in the POST request, return an error
    $response = array("error" => "Invalid request.");
}

// Send the JSON response back to the calling page
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection
mysqli_close($con);
?>
