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

if ($currentAdminLevel == "super_admin") {

    $facultyId = $_POST['facultyId'];   

    $sql = "SELECT * FROM campus_admin WHERE faculty_id = $facultyId"; 

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $facultyData = $result->fetch_assoc();
        echo json_encode($facultyData);
    } else {
        echo json_encode(['error' => 'Admin not found']);
    }
} elseif ($currentAdminLevel == "admin") {

    $facultyId = $_POST['facultyId'];   

    $sql = "SELECT * FROM college_admin WHERE faculty_id = $facultyId"; 

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $facultyData = $result->fetch_assoc();
        echo json_encode($facultyData);
    } else {
        echo json_encode(['error' => 'Admin not found']);
    }
}

?>