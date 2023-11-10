<?php

require "connect.php";

// Assuming you have a form with POST data
if ($_REQUEST["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['newPass'];
    $confirmPassword = $_POST['confirmPass'];

    // Validate passwords
    if ($newPassword == $confirmPassword) {

        // Update the password and set first_login to false
        $updateSql = "UPDATE campus_admin SET password = '$newPassword', first_login = false WHERE faculty_id = '$username'";
        
        if ($con->query($updateSql) === TRUE) {
            echo 'password updated successfully';
        } else {
            echo 'Error: ' . $con->error;
        }
    } else {
        echo 'Passwords do not match';
    }
}

$con->close();
?>