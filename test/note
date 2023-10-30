<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand custom-brand" href="#">
        <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Bulacan State University
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" id="custom-item">
            <a class="nav-link data-custom" href="VirtualBulsu_AnnouncementPanel.php">Announcements</a>
          </li>
          <?php
            if ($currentAdminLevel == "super_admin") {
              echo "<li class='nav-item' id='custom-item'>";
              echo "<a class='nav-link data-custom' href='VirtualBulsu_SuperAdmin.php'>Campus Admins</a>";
              echo "</li>";
            } else if ($currentAdminLevel == "admin") {
              echo "<li class='nav-item' id='custom-item'>";
              echo "<a class='nav-link data-custom' href='VirtualBulsu_SuperAdmin.php'>College Admins</a>";
              echo "</li>";
            }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="VirtualBulsu_AdminSettings.php">User Settings</a>
          </li>
          <li class="nav-item" id="custom-item">
            <a class="nav-link data-custom" href="#" onclick="logout()">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
</nav>