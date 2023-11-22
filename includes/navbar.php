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

  <div class="sidebar d-flex flex-column flex-shrink-0 p-3 shadow">
    <img src="resources/Virtual BulSU Logo.png" id="logo" alt="Virtual BulSU Logo">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

    <li>
        <a href="VirtualBulsu_Tour_HomePage.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navWebsite">
          <box-icon name='street-view' class="icons" color="#fff"></box-icon>
          Virtual BulSU - Tour Site
        </a>
      </li>
      
      <li>
        <a href="VirtualBulsu_AnnouncementPanel.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navAnnouncement">
          <box-icon name='notepad' class="icons" color="#fff" id="announcementLogo"></box-icon>
          Announcements
        </a>
      </li>
      
      <?php 
        if ($currentAdminLevel == "super_admin") {
          echo '
          <li>
            <a href="VirtualBulsu_SuperAdmin.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navAdmin">
              <box-icon name="universal-access" class="icons" color="#fff" id="adminLogo"></box-icon>
              Administrators
            </a>
          </li>
          <li>
            <a href="VirtualBulsu_UsersPanel.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navUsers">
              <box-icon name="group" class="icons" color="#fff" id="usersLogo"></box-icon>
              Users
            </a>
          </li>
          <li>
            <a href="VirtualBulsu_CampusManagement.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navCampus">
              <box-icon name="arch" class="icons" color="#fff" id="managementLogo"></box-icon>
              Campus Management
            </a>
          </li>
          ';
        } elseif ($currentAdminLevel == "campus_admin") {
          echo '<li>
            <a href="VirtualBulsu_UsersPanel.php" class="nav-link main-items d-flex align-items-center text-decoration-none" id="navUsers">
              <box-icon name="group" class="icons" color="#fff" id="usersLogo"></box-icon>
              Users
            </a>
          </li>';
        }
      ?>
    </ul>
  </div>
<nav class="navbar navbar-expand-lg shadow">
  <div class="container-fluid">
    <button class="btn btn-primary" id="sidebarToggle"><box-icon name='menu'></box-icon></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-lg-block ms-2" id="userNav">Hello, <?php echo $author; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item d-flex align-items-center" href="VirtualBulsu_AdminSettings.php">
          <box-icon name='user' color="#763435" class="icons"></box-icon>User Settings</a></li>
            <li><a class="dropdown-item d-flex align-items-center" href="#" onclick="logout()" name="log-out"><box-icon name='log-out' color="#763435" class="icons"></box-icon>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
