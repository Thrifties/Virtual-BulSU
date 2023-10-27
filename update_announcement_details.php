<?php
require "connect.php";

$announcementId = $_POST['announcementId'];
$campusAssignment = $_POST['campusAssignment'];
$collegeAssignment = $_POST['collegeAssignment'];
$headline = $_POST['headline'];
$description = $_POST['description'];

// Check if a file is uploaded
if (isset($_FILES['fileInput'])) {
    $fileInput = $_FILES['fileInput']['name'];
    $fileInputTmp = $_FILES['fileInput']['tmp_name'];

    // Move the uploaded file to the uploads folder
    move_uploaded_file($fileInputTmp, "uploads/" . $fileInput);
} else {
    $fileInput = null;
}

// Update the announcement details in the database
$sql = "UPDATE announcements SET campus_assignment = ?, college_assignment = ?, headline = ?, description = ?, file_input = ? WHERE announcement_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssssi", $campusAssignment, $collegeAssignment, $headline, $description, $fileInput, $announcementId);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Announcement updated']);
} else {
    echo json_encode(['error' => 'Error updating announcement details: ' . $stmt->error]);
}

$stmt->close();
?>
