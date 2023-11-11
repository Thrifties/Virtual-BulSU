<?php
require "connect.php";

// Assuming you have a user_id in your session
$user_id = $_SESSION["user"];

$campusAdminQuery = "SELECT * FROM campus_admin WHERE faculty_id = ?";
$collegeAdminQuery = "SELECT * FROM college_admin WHERE faculty_id = ?";

// Prepare and execute the query for campus_admin
$stmt = $con->prepare($campusAdminQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $adminData = mysqli_fetch_assoc($result);
    $author = $adminData["first_name"] . ' ' . $adminData["last_name"];
    $currentAdminLevel = $adminData["admin_level"];
    $currentAdminCampus = $adminData["campus"];
} else {
    // If user is not found in campus_admin, check college_admin
    $stmt = $con->prepare($collegeAdminQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $adminData = mysqli_fetch_assoc($result);
        $author = $adminData["first_name"] . ' ' . $adminData["last_name"];
        $currentAdminLevel = $adminData["admin_level"];
        $currentAdminCampus = $adminData["campus"];
        $currentCollege = $adminData["college"];
    } else {
    }
}

$stmt->close();

?>

  <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
    <img src="resources/Virtual BulSU Logo.png" id="logo" alt="Virtual BulSU Logo">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="VirtualBulsu_AnnouncementPanel.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navAnnouncement">
          <box-icon name='notepad' class="icons" color="#fff" id="announcementLogo"></box-icon>
          Announcements
        </a>
      </li>
      <?php 
        if ($currentAdminLevel == "super_admin" OR $currentAdminLevel == "admin") {
          echo '<li>
        <a href="VirtualBulsu_SuperAdmin.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navAdmin">
          <box-icon name="user-check" class="icons" color="#fff" id="adminLogo"></box-icon>
          Admins
        </a>
      </li>';
        }
      
      ?>
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="nav-link d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <box-icon name='user-circle' color='#fff' class="icons"></box-icon>
        <strong><?php echo $user_id ?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item d-flex align-items-center" href="VirtualBulsu_AdminSettings.php">
          <box-icon name='user' color="#763435" class="icons"></box-icon>User Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item d-flex align-items-center" href="#" onclick="logout()"><box-icon name='log-out' color="#763435" class="icons"></box-icon>Sign out</a></li>
      </ul>
    </div>
  </div>
