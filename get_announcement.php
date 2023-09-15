<?php
require "connect.php"; // Include your database connection script

// Get the announcement ID from the AJAX request
$announcementId = $_POST['announcementId'];

// Query the database to retrieve announcement details based on the announcement ID
$sql = "SELECT * FROM announcements WHERE announcement_id = $announcementId"; // Replace with your table name and structure

$result = $con->query($sql);

if ($result->num_rows > 0) {
    $announcementData = $result->fetch_assoc();
    
    // If you have an image URL column in your database, include it in the response
    $imageURL = $announcementData['file_input']; // Replace 'image_url' with your actual column name
    
    // Add the image URL to the announcement data
    $announcementData['file_input'] = $imageURL;

    echo json_encode($announcementData); // Send announcement data as JSON response
} else {
    echo json_encode(['error' => 'Announcement not found']);
}

?>