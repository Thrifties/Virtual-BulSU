<?php
require "connect.php";
require "includes/sessionEnd.php";



$facultyId = $_POST['facultyId'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$campusAdminQuery = "SELECT * FROM campus_admin WHERE faculty_id = ?";
$collegeAdminQuery = "SELECT * FROM college_admin WHERE faculty_id = ?";

// Prepare and execute the query for campus_admin
$stmt = $con->prepare($campusAdminQuery);
$stmt->bind_param("i", $facultyId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $sql = "UPDATE campus_admin SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', email = '$email', contact_num = '$phone' WHERE faculty_id = $facultyId";
    if ($con->query($sql) === TRUE) {
        echo json_encode(['success' => 'Admin details updated']);
    } else {
        echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
    }
} else {
    // If user is not found in campus_admin, check college_admin
    $stmt = $con->prepare($collegeAdminQuery);
    $stmt->bind_param("i", $facultyId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
            $sql = "UPDATE college_admin SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', email = '$email', contact_num = '$phone' WHERE faculty_id = $facultyId";
            if ($con->query($sql) === TRUE) {
        echo json_encode(['success' => 'Admin details updated']);
    } else {
        echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
    }
        } else {
            echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
    }
}
?>