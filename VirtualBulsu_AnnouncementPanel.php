<?php
require "includes/sessionEnd.php";
require "connect.php";

$user = $_SESSION["user"];

$query = "SELECT * FROM campus_admin WHERE faculty_id='$user'";
$result = mysqli_query($con, $query);
$adminData = mysqli_fetch_assoc($result);
$author = $adminData["first_name"] . ' ' . $adminData["last_name"];
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="includes\VirtualBulsu_Navbar.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Announcement Panel</title>
  <style>
    .announcement-panel {
      border: 1px solid #763435;
      padding: 20px;
      border-radius: 5px;
      color: #ffff;
      background-color: #763435;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #viewAnnouncementImage {
      width: 100%;
      height: auto;
    }

    td button {
      margin: 0 3px;
    }

    body {
      background:
        url("resources/try.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex;
      flex-direction: column;
    }

    #addAnnouncement {
      color: #d09b00;
      background-color: aliceblue;
      border: white;
      margin-bottom: 10px;
    }

    #addAnnouncement:hover {
      background-color: #d09b00;
      border: white;
      color: #ffff;
    }

    .side-nav {
      width: 100px;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      padding: 30px 15px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      display: flex;
      justify-content: space-between;
      flex-direction: column;
      transition: width 0.5s;
    }

    ul {
      list-style: none;
      padding: 0 15px;
      margin-right: 10px;
    }

    ul #custom-item {
      margin: 40px 0;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      cursor: pointer;
    }

    ul li img {
      width: 30px;
      height: auto;
      margin-right: 10px;
      justify-content: center;
    }

    ul #custom-item a {
      white-space: nowrap;
      display: none;
    }

    .side-nav:hover {
      width: 200px;
    }

    .side-nav:hover ul #custom-item a {
      display: block;
      color: #ffff;
    }

    .side-nav:hover ul #custom-item img {
      margin-right: 10px;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 25px;
      width: 500px;
    }

    img {
      max-width: 50px;
      max-height: auto;
    }

    h1 {
      font-size: 30px;
      padding-left: 20px;
      color: #ffff;
    }

    h2 {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="image">
      <img src="resources\BSU_Logo.png">
    </div>
    <div class="text">
      <h1>Bulacan State University</h1>
    </div>
  </div>

  <!--
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
          <li class="nav-item" id="custom-item">
            <a class="nav-link data-custom" href="VirtualBulsu_SuperAdmin.php">Admins</a>
          </li>
          <li class="nav-item" id="custom-item">
            <a class="nav-link data-custom" href="#" onclick="logout()">Log Out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="VirtualBulsu_AdminSettings.php">User Settings</a>
          </li>
        </ul>
        
      </div>
  -->

  </div>
  </nav>

  <div class="header">
    <div class="side-nav">
      <ul>
        <li class="nav-item" id="custom-item"><img src="resources/announcement.png">
          <a class="nav-link data-custom" href="VirtualBulsu_AnnouncementPanel.php">Announcements</a>
        </li>
        <li class="nav-item" id="custom-item"><img src="resources/user.png">
          <a class="nav-link data-custom" href="VirtualBulsu_SuperAdmin.php">Admins</a>
        </li>
        <li class="nav-item" id="custom-item"><img src="resources/setting.png">
          <a class="nav-link data-custom" href="VirtualBulsu_AdminSettings.php">User Settings</a>
        </li>
      </ul>

      <ul>
        <li class="nav-item" id="custom-item"><img src="resources/logout.png">
          <a class="nav-link data-custom" href="#" onclick="logout()">Log Out</a>
        </li>
      </ul>
    </div>


    <div class="container mt-5">
      <!-- Announcement Panel -->
      <div class="announcement-panel">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2>ANNOUNCEMENT PANEL</h2>
          <!--  <button class="btn btn-primary" id="addAnnouncement" data-toggle="modal" data-target="#announcementModal">Add
            Announcement</button> -->
        </div>
        <button class="btn btn-primary" id="addAnnouncement" data-toggle="modal" data-target="#announcementModal">Add
          Announcement</button>
        <div class="row">
          <div class="col-md-12">
            <div class="announcement-list">
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="table">
                    <th>Headline</th>
                    <th>Event Date</th>
                    <th>Actions</th>
                    </trc>
                </thead>
                <tbody>

                  <?php
                  // Query to fetch announcements from your database
                  $query2 = "SELECT announcement_id, headline, event_date FROM announcements";
                  $result2 = mysqli_query($con, $query2);

                  if (!$result2) {
                    die("Database query failed."); // Handle the error appropriately
                  }

                  while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr id=" . $row['announcement_id'] . ">";
                    echo "<td>" . htmlspecialchars($row['headline']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                    echo "<td>";
                    echo "<button type='button' class='btn btn-primary' id='editBtn' data-toggle='modal' data-target='#viewAnnouncementModal' onclick='editAnnouncement(" . $row['announcement_id'] . ")'>Edit</button>";
                    echo "<button type='button' class='btn btn-secondary' id='viewAnnouncement' data-toggle='modal' data-target='#viewAnnouncementModal' onclick='viewAnnouncementModal(" . $row['announcement_id'] . ")'>View</button>";
                    echo "<button type='button' class='btn btn-danger' onclick='deleteAnnouncement(" . $row['announcement_id'] . ")' data-announcement-id='" . $row['announcement_id'] . "'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                  }

                  // Release the result set
                  mysqli_free_result($result2);

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- View Announcement Modal -->
      <div class="modal fade" id="viewAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="announcementModalLabel">Announcement Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="viewAnnouncementForm" enctype="multipart/form-data">
                <input type="text" class="form-control" id="announcementId" name="announcementId" value="" hidden>
                <div class="form-group">
                  <label for="eventDate">Event Date</label>
                  <input type="date" class="form-control" id="viewEventDate" name="viewEventDate">
                </div>
                <div class="form-group">
                  <label for="headline">Headline</label>
                  <input type="text" class="form-control" id="viewHeadline" name="viewHeadline" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="viewDescription" name="viewDescription" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="formFileMultiple" class="form-label">Multiple files input
                    example</label>
                  <input class="form-control" type="file" id="viewFileInput" name="viewFileInput" multiple>
                  <img id="viewAnnouncementImage" src="" alt="Announcement Image" />
                </div>
                <div class="modal-footer d-flex justify-content-between align-content-center">
                  <p class="card-text" id="viewAuthor"><small class="text-body-secondary">Author: </small></p>
                  <button type="button" id="editViewBtn" class="btn btn-secondary" onclick="enableViewEdit()">Edit</button>
                  <button type="submit" class="btn btn-success" id="saveBtn" onclick="saveChanges()">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Announcement Modal -->
      <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="announcementModalLabel">Add Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="announcementForm" action="add_announcement.php" enctype="multipart/form-data">
                <input type="text" class="form-control" id="announcementId" name="announcementId" value="" hidden>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $author ?>" hidden>
                <div class="form-group">
                  <label for="campusAssignment">Campus Assignment</label>
                  <select class="form-control" name="campusAssignment" id="campusAssignment">
                    <option value="Malolos Campus">Malolos Campus</option>
                    <option value="Bustos Campus">Bustos Campus</option>
                    <option value="Sarmiento Campus">Sarmiento Campus</option>
                    <option value="San Rafael Campus">San Rafael Campus</option>
                    <option value="Hagonoy Campus">Hagonoy Campus</option>
                    <option value="Meneses Campus">Meneses Campus</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="eventDate">Event Date (Optional)</label>
                  <input type="date" class="form-control" id="eventDate" name="eventDate">
                </div>
                <div class="form-group">
                  <label for="headline">Headline</label>
                  <input type="text" class="form-control" id="headline" name="headline" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="formFileMultiple" class="form-label">Multiple files input
                    example</label>
                  <input class="form-control" type="file" id="fileInput" name="fileInput" multiple>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="announcementForm">Save</button>
            </div>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script>
        function viewAnnouncementModal(announcementId) {
          document.getElementById("viewEventDate").readOnly = true;
          document.getElementById("viewHeadline").readOnly = true;
          document.getElementById("viewDescription").readOnly = true;
          document.getElementById("viewFileInput").hidden = true;
          document.getElementById("viewAuthor");


          var xhr = new XMLHttpRequest();
          xhr.open("POST", "get_announcement.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              var data = JSON.parse(this.responseText);
              var ImageURL = data.file_input;
              document.getElementById("announcementId").value = data.announcement_id;
              document.getElementById("viewEventDate").value = data.event_date;
              document.getElementById("viewHeadline").value = data.headline;
              document.getElementById("viewDescription").value = data.description;
              document.getElementById("viewAnnouncementImage").src = "uploads/" + ImageURL;
              document.getElementById("viewAuthor").innerHTML = "<small class='text-body-secondary'>Author: </small>" + data.author;
            }
          };

          xhr.send("announcementId=" + announcementId);

          document.getElementById("saveBtn").hidden = true;
          document.getElementById("editViewBtn").hidden = false;
        }

        function enableViewEdit() {
          editAnnouncement(announcementId);
        }

        function editAnnouncement(announcementId) {
          document.getElementById("viewEventDate").readOnly = false;
          document.getElementById("viewHeadline").readOnly = false;
          document.getElementById("viewDescription").readOnly = false;
          document.getElementById("viewFileInput").hidden = false;

          var xhr = new XMLHttpRequest();
          xhr.open("POST", "get_announcement.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              var data = JSON.parse(this.responseText);
              var ImageURL = data.file_input;
              document.getElementById("announcementId").value = data.announcement_id;
              document.getElementById("viewEventDate").value = data.event_date;
              document.getElementById("viewHeadline").value = data.headline;
              document.getElementById("viewDescription").value = data.description;
              document.getElementById("viewFileInput").value = data.file_input;
              document.getElementById("viewAnnouncementImage").src = "uploads/" + ImageURL;
            }
          };
          xhr.send("announcementId=" + announcementId);

          document.getElementById("saveBtn").hidden = false;
          document.getElementById("editViewBtn").hidden = true;
        }

        function saveChanges() {
          var announcementId = document.getElementById("announcementId").value;
          var eventDate = document.getElementById("viewEventDate").value;
          var headline = document.getElementById("viewHeadline").value;
          var description = document.getElementById("viewDescription").value;
          document.getElementById("viewFileInput").value;

          var xhr = new XMLHttpRequest();
          xhr.open("POST", "update_announcement_details.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              var data = JSON.parse(this.responseText);
              if (response.success) {
                alert(response.success);
              } else {
                alert(response.error);
              }
            } else {
              alert("Error updating announcement");
            }
          };

          xhr.send("announcementId=" + announcementId + "&eventDate=" + eventDate + "&headline=" + headline + "&description=" + description);

          document.getElementById("viewEventDate").readOnly = true;
          document.getElementById("viewHeadline").readOnly = true;
          document.getElementById("viewDescription").readOnly = true;
          document.getElementById("viewFileInput").disabled = true;

          document.getElementById("saveBtn").hidden = true;
          document.getElementById("editViewBtn").hidden = false;
        }

        function deleteAnnouncement(announcementId) {
          if (confirm("Are you sure you want to delete this announcement?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_announcement.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
              if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                var response = JSON.parse(this.responseText);
                if (response.success) {
                  // Remove the deleted row from the table
                  var row = document.getElementById(announcementId);
                  row.parentNode.removeChild(row);
                  alert(response.success);
                } else {
                  alert(response.error);
                }
              }
            };
            xhr.send("announcementId=" + announcementId);
          }
        }

        function logout() {
          var choice = confirm("Do you really want to log out?");
          if (choice == true)
            window.location = "logout.php";
        }
      </script>

</body>

</html>