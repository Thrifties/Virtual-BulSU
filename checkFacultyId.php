<?php
require "connect.php"; // Include your database connection script

// Get the faculty ID from the query string
$facultyId = $_GET['faculty_id'];

// Check in campus_admin table
$campusAdminQuery = "SELECT * FROM campus_admin WHERE faculty_id = '$facultyId'";
$resultCampusAdmin = mysqli_query($con, $campusAdminQuery);

// Check in college_admin table if not found in campus_admin
if (mysqli_num_rows($resultCampusAdmin) == 0) {
    $collegeAdminQuery = "SELECT * FROM college_admin WHERE faculty_id = '$facultyId'";
    $resultCollegeAdmin = mysqli_query($con, $collegeAdminQuery);

    if (mysqli_num_rows($resultCollegeAdmin) > 0) {
        echo "Faculty ID is already taken.";
    } else {
        echo '<div class="valid-feedback">
                Looks good!
              </div>';
    }
} else {
    echo "Faculty ID is already taken.";
}

// Close the database connection
mysqli_close($con);
?>