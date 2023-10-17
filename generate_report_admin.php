<?php
require "connect.php";
require "includes/sessionEnd.php";

// Assuming you have a user_id in your session
$user_id = $_SESSION["user"];

$campusAdminQuery = "SELECT faculty_id, first_name, middle_name, last_name, email, contact_num, campus FROM campus_admin";
$collegeAdminQuery = "SELECT faculty_id, first_name, middle_name, last_name, email, contact_num, college FROM college_admin WHERE campus_admin_id = ?";

// Function to generate CSV
function generateCSV($result, $adminType) {
    $filename = "admins_$adminType.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $output = fopen('php://output', 'w');

    // Add CSV headers
    fputcsv($output, array('Faculty ID', 'First Name', 'Middle Name', 'Last Name', 'Email', 'Contact Number', 'Campus', 'College'));

    // Add data to CSV
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
}

// Check the admin level
$stmt = $con->prepare("SELECT admin_level FROM campus_admin WHERE faculty_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$resultAdminLevel = $stmt->get_result();
$row = $resultAdminLevel->fetch_assoc();
$adminLevel = $row['admin_level'];

// Fetch data based on admin level
if ($adminLevel === 'super_admin') {
    // Fetch all campus admins
    $resultCampus = mysqli_query($con, $campusAdminQuery);
    generateCSV($resultCampus, "Campus");
} else if ($adminLevel === 'admin') {
    // Fetch college admins under the current campus admin
    $stmt = $con->prepare($collegeAdminQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $resultCollege = $stmt->get_result();
    generateCSV($resultCollege, "College");
} else {
    // Handle unknown admin level
    echo "Unknown admin level.";
}
?>
