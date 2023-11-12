<?php

require "connect.php";
require "includes/sessionEnd.php";

$currentAdminId = $_SESSION["user"];

$sql1 = "SELECT * FROM campus_admin WHERE faculty_id = '$currentAdminId'";
$result1 = $con->query($sql1);

if ($result1) {
    while ($row = $result1->fetch_assoc()) {
        $currentAdminLevel = $row['admin_level'];
        $currentAdminCampus = $row['campus'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($currentAdminLevel == "super_admin") {
        $facultyId = $_POST["addFacultyId"];
        $password = $_POST["addPassword"];
        $firstName = $_POST["firstName"];
        $middleName = $_POST["middleName"];
        $lastName = $_POST["lastName"];
        $campus = $_POST["addCampus"];
        $email = $_POST["addEmail"];
        $phone = $_POST["addPhone"];
        $query = "INSERT INTO `campus_admin`(`faculty_id`, `first_name`, `middle_name`, `last_name`, `campus`, `email`, `contact_num`, `password`) VALUES ('$facultyId','$firstName','$middleName','$lastName','$campus','$email','$phone','$password')";
        if (mysqli_query($con, $query)) {
            // Return a success message (you can customize the response as needed)
            echo "Admin added successfully!";
        } else {
            // Return an error message (you can customize the response as needed)
            echo "Error: Unable to add admin.";
        }
    } elseif ($currentAdminLevel == "admin") {
        $facultyId = $_POST["addFacultyId"];
        $password = $_POST["addPassword"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $firstName = $_POST["firstName"];
        $middleName = $_POST["middleName"];
        $lastName = $_POST["lastName"];
        $campus = $_POST["addCampus"];
        $college = $_POST["addCollege"];
        $email = $_POST["addEmail"];
        $phone = $_POST["addPhone"];
        $query = "INSERT INTO `college_admin`(`faculty_id`, `first_name`, `middle_name`, `last_name`, `campus`, `college`, `email`, `contact_num`, `password`) VALUES ('$facultyId','$firstName','$middleName','$lastName','$currentAdminCampus','$college','$email','$phone','$password')";
        if (mysqli_query($con, $query)) {
            // Return a success message (you can customize the response as needed)
            echo "Admin added successfully!";
        } else {
            // Return an error message (you can customize the response as needed)
            echo "Error: Unable to add admin.";
        }
    }
}
?>
