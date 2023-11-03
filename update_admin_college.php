<?php
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facultyId = $_POST['facultyId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the admin details in the database using prepared statements
    $sql = "UPDATE college_admin SET first_name = ?, middle_name = ?, last_name = ?, campus = ?, college = ?, email = ?, contact_num = ? WHERE faculty_id = ?";

    // Prepare the statement
    $stmt = $con->prepare($sql);
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssssi", $firstName, $middleName, $lastName, $campus, $college, $email, $phone, $facultyId);

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
