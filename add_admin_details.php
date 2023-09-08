<?php

    require "connect.php";

    $facultyId = $_POST["addFacultyId"];
    $password = $_POST["addPassword"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $campus = $_POST["addCampus"];
    $email = $_POST["addEmail"];
    $phone = $_POST["addPhone"];

    $query = "INSERT INTO `campus_admin`(`faculty_id`, `first_name`, `middle_name`, `last_name`, `campus`, `email`, `contact_num`, `password`) VALUES ('$facultyId','$firstName','$middleName','$lastName','$campus','$email','$phone','$password')";

    if (mysqli_query($con,$query)) {
        header("refresh: 3; url=VirtualBulsu_SuperAdmin.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
            Failed to add Admin!
            </div>';
        header("refresh: 3; url=VirtualBulsu_SuperAdmin.php");
    }
?>
