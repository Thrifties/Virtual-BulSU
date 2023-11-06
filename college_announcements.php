<?php
// Include your database connection code here (e.g., connect.php)
require "connect.php";

// Get the college and campus parameters
$college = $_GET['college'];
$campus = $_GET['campus'];

// Prepare and execute a query to retrieve announcements
$query = "SELECT announcement_id, headline, file_input FROM announcements WHERE college_assignment = '$college' AND campus_assignment = '$campus' ORDER BY created_at DESC";
$result = mysqli_query($con, $query);

if ($result) {
    $announcements = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $announcements[] = array(
            'announcement_id' => $row['announcement_id'],
            'headline' => $row['headline'],
            'file_input' => $row['file_input'],
        );
    }

    // Send the announcements data as JSON
    header('Content-Type: application/json');
    echo json_encode($announcements);
} else {
    // If there's an error, return an error message as JSON
    echo json_encode(array('error' => 'Error fetching data.'));
}
