<?php
require "connect.php"; // Include your database connection script

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcementId = $_POST["announcementId"];
    $facultyId = $_POST["facultyId"];
    $headline = $_POST["headline"];
    $description = $_POST["description"];
    $author = $_POST["author"];
    $campusAssignment = $_POST["campusAssignment"];
    $collegeAssignment = $_POST["collegeAssignment"];

    // Check if a file was uploaded
    if ($_FILES["fileInput"]["name"]) {
        $file_name = $_FILES["fileInput"]["name"];
        $file_tmp = $_FILES["fileInput"]["tmp_name"];
        $file_type = $_FILES["fileInput"]["type"];
        $file_size = $_FILES["fileInput"]["size"];
        $file_error = $_FILES["fileInput"]["error"];

        // Move the uploaded file to a directory on your server
        $upload_dir = "uploads/"; // Create this directory if it doesn't exist
        move_uploaded_file($file_tmp, $upload_dir . $file_name);
    } else {
        $file_name = null; // No file uploaded
    }

    // Insert the announcement into the MySQL database
    $sql = "INSERT INTO announcements (announcement_id, author, faculty_id, headline, description, file_input, campus_assignment, college_assignment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssss", $announcementId, $author, $facultyId, $headline, $description, $file_name, $campusAssignment, $collegeAssignment);

    if ($stmt->execute()) {
        // Successful insertion
        header("refresh: 1; url=VirtualBulsu_AnnouncementPanel.php"); // Redirect to the announcement panel
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $con->close();
}
?>
