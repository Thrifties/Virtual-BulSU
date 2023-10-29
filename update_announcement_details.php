<?php
require "connect.php";

$announcementId = $_POST['announcementId'];
$campusAssignment = $_POST['campusAssignment'];
$collegeAssignment = $_POST['collegeAssignment'];
$headline = $_POST['headline'];
$description = $_POST['description'];

// Initialize $fileInput as null
$fileInput = null;

// Check if a file is uploaded
if (isset($_FILES['fileInput'])) {
    $fileInput = $_FILES['fileInput']['name'];
    $fileInputTmp = $_FILES['fileInput']['tmp_name'];

    // Move the uploaded file to the uploads folder
    move_uploaded_file($fileInputTmp, "uploads/" . $fileInput);
}

// Update the announcement details in the database
$sql = "UPDATE announcements SET campus_assignment = ?, college_assignment = ?, headline = ?, description = ?";
// Include 'file_input' and 'updated_at' in the SQL query if a file was uploaded
if ($fileInput !== null) {
    $sql .= ", file_input = ?, updated_at = NOW()";
} else {
    $sql .= ", updated_at = NOW()";
}
$sql .= " WHERE announcement_id = ?";

$stmt = $con->prepare($sql);
if ($fileInput !== null) {
    $stmt->bind_param("sssssi", $campusAssignment, $collegeAssignment, $headline, $description, $fileInput, $announcementId);
} else {
    $stmt->bind_param("ssssi", $campusAssignment, $collegeAssignment, $headline, $description, $announcementId);
}

if ($stmt->execute()) {
    echo json_encode(['success' => 'Announcement updated']);
} else {
    echo json_encode(['error' => 'Error updating announcement details: ' . $stmt->error]);
}

$stmt->close();
?>
