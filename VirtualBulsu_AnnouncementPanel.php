<?php 
require "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="includes\VirtualBulsu_Navbar.css">
    <title>Announcement Panel</title>
    <style>
      .announcement-panel {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div class="container-fluid">
        <a class="navbar-brand custom-brand" href="#">
          <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
          Bulacan State University
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" id="custom-item">
              <a class="nav-link data-custom" href="VirtualBulsu_AnnouncementPanel.html">Announcements</a>
            </li>
            <li class="nav-item" id="custom-item">
              <a class="nav-link data-custom" href="VirtualBulsu_SuperAdmin.html">Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="VirtualBulsu_AdminSettings.html">
                <span class="user-icon">
                  <i class='bx bx-user'></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <!-- Announcement Panel -->
      <div class="announcement-panel">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2>Announcement Panel</h2>
          <button class="btn btn-primary" data-toggle="modal" data-target="#announcementModal">Add
            Announcement</button>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="announcement-list">
              <table class="table table-hover">
                <thead>
                    <tr class="table">
                        <th>Headline</th>
                        <th>Event Date</th>
                    </trc>
                </thead>
                <tbody>
                    <?php

                  // Query to fetch announcements from your database
                  $query = "SELECT announcement_id, headline, event_date FROM announcements";
                  $result = mysqli_query($con, $query);

                  if (!$result) {
                      die("Database query failed."); // Handle the error appropriately
                  }

                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr id=".$row['announcement_id'].">";
                      echo "<td>" . htmlspecialchars($row['headline']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                      echo "</tr>";
                  }

                  // Release the result set
                  mysqli_free_result($result);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Announcement Title</h5>
                <p class="card-text">This is the content of the announcement.</p>
                <p class="card-text" id="card-date"><small class="text-muted">Posted on June 12,
                    2023</small></p>
                <img src="resources\sarmiento.jpg" class="card-img-bottom" alt="...">
                <!-- Add the Update and Delete buttons -->
                <div class="form-group my-3">
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#updateModal">Update</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Add the Update Modal -->
      <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalLabel">Update Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="eventDate">Event Date (Optional)</label>
                  <input type="date" class="form-control" id="updateEventDate">
                </div>
                <div class="form-group">
                  <label for="updateHeadline">Headline</label>
                  <input type="text" class="form-control" id="updateHeadline" required>
                </div>
                <div class="form-group">
                  <label for="updateDescription">Description</label>
                  <textarea class="form-control" id="updateDescription" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="formFileMultiple" class="form-label">Multiple files input
                    example</label>
                  <input class="form-control" type="file" id="updateFile" multiple>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="updateAnnouncementBtn">Update</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Announcement Modal -->
      <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog"
        aria-labelledby="announcementModalLabel" aria-hidden="true">
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
        $(document).ready(function () {
          // Update button click event handler
          $('#updateAnnouncementBtn').click(function () {
            // Get the updated headline and description from the modal fields
            const updatedHeadline = $('#updateHeadline').val();
            const updatedDescription = $('#updateDescription').val();
            const updatedEventDate = $('#updateEventDate').val();

            // Update the announcement card content
            $('.card-title').text(updatedHeadline);
            $('.card-text').text(updatedDescription);
            $('#card-date').text(updatedEventDate);

            // Close the modal
            $('#updateModal').modal('hide');
          });

          $('#announcementModal').on('show.bs.modal', function () {
            // Get the current date in the format YYYYMMDD
            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // January is 0
            var day = currentDate.getDate().toString().padStart(2, '0');

            // Generate two random numbers between 0 and 99
            var randomNumber1 = Math.floor(Math.random() * 100).toString().padStart(2, '0');
            var randomNumber2 = Math.floor(Math.random() * 100).toString().padStart(2, '0');

            // Combine the date and random numbers to create the announcement ID
            var announcementId = year + month + day + randomNumber1 + randomNumber2;

            // Set the announcementId as the value of the hidden input field
            $('#announcementId').val(announcementId);
          });
        });

              // Function to update the announcement card when a row is clicked
        function updateAnnouncementCard(announcementId) {
          // Send an AJAX request to fetch the announcement details
          $.ajax({
              url: 'get_announcement.php', // Replace with the server-side script to fetch announcement details
              method: 'GET',
              data: { announcementId: announcementId },
              dataType: 'json',
              success: function (announcementData) {
                  // Update the announcement card with the retrieved data
                  $('.card-title').text(announcementData.headline);
                  $('.card-text').text(announcementData.description);
                  $('#card-date').text(announcementData.event_date);
                  // You can also update the image if needed
                  // $('.card-img-bottom').attr('src', data.image_url);
              },
              error: function () {
                  // Handle errors here
                  alert('Failed to fetch announcement details.');
              }
          });
        }

        // Attach a click event handler to each table row
        $('.table-row').click(function () {
            // Get the announcement ID from the row's ID attribute
            var announcementId = this.id.split('_')[1];
            // Call the function to update the announcement card
            updateAnnouncementCard(announcementId);
        });
      </script>
  </body>

</html>