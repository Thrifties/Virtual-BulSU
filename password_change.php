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
        $updateSql = "UPDATE admins SET password = '$hashedPassword', first_login = false WHERE username = '$username'";
        
        if ($conn->query($updateSql) === TRUE) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Passwords do not match";
    }
}

$conn->close();
?>
