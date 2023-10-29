<?php
require "connect.php";
require "includes/sessionEnd.php";

$user_id = $_SESSION["user"];

$campusAdminQuery = "SELECT * FROM campus_admin WHERE faculty_id = ?";
$collegeAdminQuery = "SELECT * FROM college_admin WHERE faculty_id = ?";

$stmt = $con->prepare($campusAdminQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $adminData = mysqli_fetch_assoc($result);
    $currentAdminLevel = $adminData["admin_level"];
    $currentAdminCampus = $adminData["campus"];
} else {
    $stmt = $con->prepare($collegeAdminQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $adminData = mysqli_fetch_assoc($result);
        $currentAdminLevel = $adminData["admin_level"];
        $currentAdminCampus = $adminData["campus"];
        $currentCollege = $adminData["college"];
    }
}

if ($currentAdminLevel == 'super_admin') {
    $sql = "SELECT * FROM announcements";
} elseif ($currentAdminLevel == 'admin') {
    // Admin can see announcements for their campus.
    $sql = "SELECT * FROM announcements WHERE campus = '$currentAdminCampus'";
} elseif ($currentAdminLevel == 'college_admin') {
    // College admin can see announcements for their campus and college.
    $sql = "SELECT * FROM announcements WHERE campus = '$currentAdminCampus' AND college = '$currentCollege'";
}

$result1 = $con->query($sql);

if ($result1->num_rows > 0) {
    $announcementData = $result1->fetch_all(MYSQLI_ASSOC);
    echo json_encode($announcementData);
} else {
    echo json_encode(['error' => 'Announcement not found']);
}
?>
