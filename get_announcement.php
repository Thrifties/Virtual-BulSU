<?php
require "connect.php"; // Include your database connection script

// Get the announcement ID from the AJAX request
$announcementId = $_POST['announcementId'];

// Query the database to retrieve announcement details based on the announcement ID
$sql = "SELECT * FROM announcements WHERE announcement_id = $announcementId"; // Replace with your table name and structure

$result = $con->query($sql);

if ($result->num_rows > 0) {
    $announcementData = $result->fetch_assoc();

    echo json_encode($announcementData); // Send announcement data as JSON response
} else {
    echo json_encode(['error' => 'Announcement not found']);
}

?>