<?php

require "connect.php";

// Assuming you have a form with POST data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $newPassword = $_POST['newPass'];
    $confirmPassword = $_POST['confirmPass'];

    // Validate passwords
    if ($newPassword == $confirmPassword) {

        // Prepare and bind the parameters
        $updateSql = "UPDATE college_admin SET password = ?, first_login = false WHERE faculty_id = ?";
        $stmt = $con->prepare($updateSql);
        $stmt->bind_param("ss", $newPassword, $username);

        // Execute the statement
        if ($stmt->execute()) {
            echo 'Password updated successfully';
        } else {
            echo 'Error: ' . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 'Passwords do not match';
    }

    // Close the database connection
    $con->close();
}
?>
