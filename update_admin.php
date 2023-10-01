<?php
require "connect.php";

$currentAdminId = $_SESSION["user"];

    $facultyId = $_POST['facultyId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $campus = $_POST['campus'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the admin details in the database
    $sql = "UPDATE campus_admin SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', campus = '$campus', email = '$email', contact_num = '$phone' WHERE faculty_id = $facultyId";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['success' => 'Admin details updated']);
    } else {
        echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
    }


?>
