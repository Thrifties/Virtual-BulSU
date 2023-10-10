<?php
require "connect.php";

    $facultyId = $_POST['facultyId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the admin details in the database
    $sql = "UPDATE college_admin SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', campus = '$campus', college = '$college', email = '$email', contact_num = '$phone' WHERE faculty_id = $facultyId";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['success' => 'Admin details updated']);
    } else {
        echo json_encode(['error' => 'Error updating admin details: ' . $con->error]);
    }
?>
