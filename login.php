
<?php
session_start();
require "connect.php"; 

if(isset($_SESSION["user"]) && isset($_SESSION["pass"])){
		
	header("Location: VirtualBulsu_AnnouncementPanel.php");
	exit();
}	


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Assuming you have two tables: campus_admin and college_admin
    $campusAdminQuery = "SELECT * FROM campus_admin WHERE faculty_id = ? AND password = ?";
    $collegeAdminQuery = "SELECT * FROM college_admin WHERE faculty_id = ? AND password = ?";

    // Prepare and execute the query for campus_admin
    $stmt = $con->prepare($campusAdminQuery);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
		$_SESSION["user"] = $user;
		$_SESSION["pass"] = $pass;
    header("refresh: 1; url=VirtualBulsu_AnnouncementPanel.php");

		
    } else {
        // If user is not found in campus_admin, check college_admin
        $stmt = $con->prepare($collegeAdminQuery);
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
		

        if ($result->num_rows > 0) {
            $_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;
            $output = '<div class="alert alert-success" role="alert">
                            Login successful!
                        </div>';
    		header("refresh: 1; url=VirtualBulsu_AnnouncementPanel.php");

        } else {
            // User not found in either table
            $output = '<div class="alert alert-danger" role="alert">
                            Invalid username or password!
                        </div>';
            header("refresh: 1; url=VirtualBulsu_Login.php");
        }
    }

    $stmt->close();
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <title>Virtual BulSU</title>
    <?php include "includes/cdn.php"?>
</head>
<body>
<?php $output ?>
<?php include "includes/js_cdn.php"?>
</body>
</html>
