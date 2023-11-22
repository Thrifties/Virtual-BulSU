<?php
// Include your database connection code (e.g., "connect.php").
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
    $sql = "SELECT * FROM college_admin WHERE faculty_id != '$currentAdminId'";

} elseif ($currentAdminLevel == "admin") {
    $sql = "SELECT * FROM college_admin WHERE campus = '$currentAdminCampus' AND faculty_id != '$currentAdminId'";
}

$result = $con->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data); // Send admin data as JSON response
} else {
    echo json_encode(['error' => 'No Admins Yet']);
}
?>