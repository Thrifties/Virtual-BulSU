<?php
require "connect.php"; // Include your database connection script

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcementId = $_POST["announcementId"];
    $facultyId = $_POST["facultyId"];
    $headline = $_POST["headline"];
    $description = nl2br($_POST["description"]);
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

    // Check the file type
    $allowed_file_types = ["image/jpeg", "image/jpg", "image/png"];
    $file_info = pathinfo($file_name);
    $file_extension = $file_info["extension"];
    
    if (in_array($file_type, $allowed_file_types) && in_array($file_extension, ["jpeg", "jpg", "png"])) {
        // Move the uploaded file to a directory on your server
        $upload_dir = "uploads/"; // Create this directory if it doesn't exist
        move_uploaded_file($file_tmp, $upload_dir . $file_name);
        
    } else {
        echo "Only JPG and PNG files are allowed.";
        // You can choose to handle the error as needed
    }
} else {
    $file_name = null; // No file uploaded
}

    // Insert the announcement into the MySQL database
    $sql = "INSERT INTO announcements (announcement_id, author, faculty_id, headline, description, file_input, campus_assignment, college_assignment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssss", $announcementId, $author, $facultyId, $headline, $description, $file_name, $campusAssignment, $collegeAssignment);

    if ($stmt->execute()) {
        // Successful insertion
        echo "Announcement added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $con->close();
}
?>
