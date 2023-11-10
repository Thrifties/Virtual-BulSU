<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>


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

        echo '<script>
            $(document).ready(function(){
                Swal.fire({
                    icon: "success",
                    title: "Log In Successfully!",
                    showConfirmButton: false,
                    timer: 2000,
                    })
                    .then(function(){
                    window.location.href = "VirtualBulsu_AnnouncementPanel.php" 
                    })
            });
            </script>';

    } else {
        // If user is not found in campus_admin, check college_admin
        $stmt = $con->prepare($collegeAdminQuery);
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
		

        if ($result->num_rows > 0) {
            $_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;
            echo '<script>
            $(document).ready(function(){
                Swal.fire({
                    icon: "success",
                    title: "Log In Successfully!",
                    showConfirmButton: false,
                    timer: 2000,
                    })
                    .then(function(){
                    window.location.href = "VirtualBulsu_AnnouncementPanel.php" 
                    })
            });
            </script>';

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