<?php
require "connect.php";

$currentAdminId = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facultyId = $_POST['facultyId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $campus = $_POST['campus'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the admin details in the database using prepared statements
    $sql = "UPDATE campus_admin SET first_name = ?, middle_name = ?, last_name = ?, campus = ?, email = ?, contact_num = ? WHERE faculty_id = ?";

    // Prepare the statement
    $stmt = $con->prepare($sql);
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("ssssssi", $firstName, $middleName, $lastName, $campus, $email, $phone, $facultyId);

            if ($stmt->execute()) {
                echo json_encode(['success' => 'Admin details updated']);
            } else {
                echo json_encode(['error' => 'Error updating admin details: ' . $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['error' => 'Error preparing the statement']);
        }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
