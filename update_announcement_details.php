<?php
require "connect.php";

$announcementId = $_POST['announcementId'];
$eventDate = $_POST['eventDate'];
$headline = $_POST['headline'];
$description = $_POST['description'];



$sql = "UPDATE announcements SET headline = '$headline', event_date = '$eventDate', description = '$description'  WHERE announcement_id = $announcementId";

if ($con->query($sql) === TRUE) {
    echo json_encode(['success' => 'Admin details updated']);
} else {
    echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
}
?>
