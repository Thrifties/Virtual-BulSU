<?php
require "connect.php";

$announcementId = $_POST['announcementId'];
$campusAssignment = $_POST['campusAssignment'];
$collegeAssignment = $_POST['collegeAssignment'];
$eventDate = $_POST['eventDate'];
$headline = $_POST['headline'];
$description = $_POST['description'];



$sql = "UPDATE announcements SET campus_assignment = '$campusAssignment', college_assignment = '$collegeAssignment', headline = '$headline', event_date = '$eventDate', description = '$description'  WHERE announcement_id = $announcementId";

if ($con->query($sql) === TRUE) {
    echo json_encode(['success' => 'Admin details updated']);
} else {
    echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
}
?>
