<?php

require "connect.php";

// Assuming you have a form with POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validate passwords
    if ($newPassword == $confirmPassword) {
        // Hash the new password (you should use a secure hashing algorithm like bcrypt)
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password and set first_login to false
        $updateSql = "UPDATE college_admin SET password = '$hashedPassword', first_login = false WHERE faculty_id = '$username'";
        
        if ($con->query($updateSql) === TRUE) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Passwords do not match";
    }
}

$con->close();
?>