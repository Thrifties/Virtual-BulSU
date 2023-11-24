<?php
require "includes/sessionEnd.php";
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
    $firstLogin = $adminData["first_login"];
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
        $firstLogin = $adminData["first_login"];
    } else {
    }
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "includes/cdn.php" ?>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/navbar.css">
  <link rel="stylesheet" href="CSS/announcement_panel.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="sweetalert2.all.min.js"></script>
  <title>Announcement Panel</title>
</head>

<body>
  
  <?php include "includes/navbar.php" ?>

  <div class="container-fluid mt-5" id="announcementPage">
    <!-- Announcement Panel -->
    <div class="announcement-panel">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2><?php if ($currentAdminLevel === "super_admin") {
          echo 'Announcement Panel';
        } elseif ($currentAdminLevel === "admin" OR $currentAdminLevel === "college_admin") {
          echo $currentAdminCampus . ' - Announcement Panel ';
        } ?></h2>
        <button class="btn btn-primary" id="addAnnouncement" data-bs-toggle="modal" data-bs-target="#announcementModal">Add
          Announcement</button>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="announcement-list">
            <table class="table table-striped table-hover" id="announcementTbl">
              <thead>
                <tr class="table">
                  <th>Headline</th>
                  <th>Campus</th>
                  <th>College</th>
                  <th>Author</th>
                  <th>Faculty ID</th>
                  <th>Date Posted</th>
                  <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                
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
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form method="post" class="needs-validation" id="viewAnnouncementForm" enctype="multipart/form-data">
              <input type="text" class="form-control" id="announcementId" name="announcementId" value="" hidden>
              <?php if($currentAdminLevel == "super_admin"): 
              echo "
                <div class='form-group'>
                  <label for='campusAssignment'>Campus Assignment</label>
                  <select class='form-control' name='viewCampusAssignment' id='viewCampusAssignment'>
                    <option value='Malolos Campus'>Malolos Campus</option>
                    <option value='Bustos Campus'>Bustos Campus</option>
                    <option value='Sarmiento Campus'>Sarmiento Campus</option>
                    <option value='San Rafael Campus'>San Rafael Campus</option>
                    <option value='Hagonoy Campus'>Hagonoy Campus</option>
                    <option value='Meneses Campus'>Meneses Campus</option>
                  </select>
                </div>
                <div class='form-group'>
                  <label for='college'>College Assignment</label>
                  <select class='form-control' name='viewCollegeAssignment' id='viewCollegeAssignment'>
                    <option value='' disabled selected>-- Select College --</option>
                    <option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>
                    <option value='College of Arts and Letters'>College of Arts and Letters</option>
                    <option value='College of Business Administration'>College of Business Administration</option>
                    <option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>
                    <option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>
                    <option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>
                    <option value='College of Industrial Technology'>College of Industrial Technology</option>
                    <option value='College of Law'>College of Law</option>
                    <option value='College of Nursing'>College of Nursing</option>
                    <option value='College of Engineering'>College of Engineering</option>
                    <option value='College of Education'>College of Education</option>
                    <option value='College of Science'>College of Science</option>
                    <option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>
                    <option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>
                    <option value='Graduate School'>Graduate School</option>
                  </select>
                </div>
              "; endif; ?>
              <?php if($currentAdminLevel == "admin"): 
              echo "
                <input type='text' class='form-control' id='viewCampusAssignment' name='viewCampusAssignment' value='$currentAdminCampus' hidden>
                <div class='form-group'>
                  <label for='college'>College Assignment</label>
                  <select class='form-control' name='viewCollegeAssignment' id='viewCollegeAssignment'>
                    <option value='' disabled selected>-- Select College --</option>
                    <option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>
                    <option value='College of Arts and Letters'>College of Arts and Letters</option>
                    <option value='College of Business Administration'>College of Business Administration</option>
                    <option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>
                    <option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>
                    <option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>
                    <option value='College of Industrial Technology'>College of Industrial Technology</option>
                    <option value='College of Law'>College of Law</option>
                    <option value='College of Nursing'>College of Nursing</option>
                    <option value='College of Engineering'>College of Engineering</option>
                    <option value='College of Education'>College of Education</option>
                    <option value='College of Science'>College of Science</option>
                    <option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>
                    <option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>
                    <option value='Graduate School'>Graduate School</option>
                  </select>
                </div>
              "; endif; ?>
              <?php if($currentAdminLevel == "college_admin"): 
              echo "
                <input type='text' class='form-control' id='viewCampusAssignment' name='viewCampusAssignment' value='".$adminData["campus"]."' hidden>
                <input type='text' class='form-control' id='viewCollegeAssignment' name='viewCollegeAssignment' value='$currentCollege' hidden>
              "; endif; ?>
              <div class="form-group">
                <label for="headline">Headline</label>
                <input type="text" class="form-control" id="viewHeadline" name="viewHeadline" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="viewDescription" name="viewDescription" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="formFileMultiple" class="form-label">Upload Image</label>
                <input class="form-control" type="file" id="viewFileInput" name="viewFileInput">
                <img id="viewAnnouncementImage" class="rounded" src="" alt="Announcement Image" />
              </div>
              <div class="modal-footer d-flex justify-content-between align-content-center">
                <p class="card-text" id="viewAuthor"><small class="text-body-secondary">Author: </small></p>
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
            <h5 class="modal-title h5" id="announcementModalLabel">Add Announcement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form method="post" class="needs-validation" id="announcementForm" action="add_announcement.php" onsubmit="submitAnnouncementForm(event)" enctype="multipart/form-data">
              <input type="text" class="form-control" id="announcementId" name="announcementId" value="" hidden>
              <input type="text" class="form-control " id="author" name="author" value="<?php echo $author ?>" hidden>
              <input type="text" class="form-control" id="faculty_id" name="facultyId" value="<?php echo $user_id ?>" hidden>
              <?php if($currentAdminLevel == "super_admin"): 
              echo "
                <div class='form-group mt-2'>
                  <labelfor='campusAssignment'>Campus Assignment</labelfor=>
                  <select class='form-control' name='campusAssignment' id='campusAssignment' required>
                    <option value='' disabled selected>-- Select Campus --</option>
                    <option value='Malolos Campus'>Malolos Campus</option>
                    <option value='Bustos Campus'>Bustos Campus</option>
                    <option value='Sarmiento Campus'>Sarmiento Campus</option>
                    <option value='San Rafael Campus'>San Rafael Campus</option>
                    <option value='Hagonoy Campus'>Hagonoy Campus</option>
                    <option value='Meneses Campus'>Meneses Campus</option>
                  </select>
                </div>
                <div class='form-group mt-2'>
                  <label for='college'>College Assignment</label>
                  <select class='form-control' name='collegeAssignment' id='collegeAssignment' required>
                    <option value='' disabled selected>-- Select College --</option>
                    <option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>
                    <option value='College of Arts and Letters'>College of Arts and Letters</option>
                    <option value='College of Business Administration'>College of Business Administration</option>
                    <option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>
                    <option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>
                    <option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>
                    <option value='College of Industrial Technology'>College of Industrial Technology</option>
                    <option value='College of Law'>College of Law</option>
                    <option value='College of Nursing'>College of Nursing</option>
                    <option value='College of Engineering'>College of Engineering</option>
                    <option value='College of Education'>College of Education</option>
                    <option value='College of Science'>College of Science</option>
                    <option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>
                    <option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>
                    <option value='Graduate School'>Graduate School</option>
                  </select>
                </div>
              "; endif; ?>
              <?php if($currentAdminLevel == "admin"): 
              echo "
                <input type='text' class='form-control' id='campusAssignment' name='campusAssignment' value='$currentAdminCampus' hidden>
                <div class='form-group mt-2'>
                  <label for='college'>College Assignment</label>
                  <select class='form-control' name='collegeAssignment' id='collegeAssignment' required>
                    <option value='' disabled selected>-- Select College --</option>
                    <option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>
                    <option value='College of Arts and Letters'>College of Arts and Letters</option>
                    <option value='College of Business Administration'>College of Business Administration</option>
                    <option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>
                    <option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>
                    <option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>
                    <option value='College of Industrial Technology'>College of Industrial Technology</option>
                    <option value='College of Law'>College of Law</option>
                    <option value='College of Nursing'>College of Nursing</option>
                    <option value='College of Engineering'>College of Engineering</option>
                    <option value='College of Education'>College of Education</option>
                    <option value='College of Science'>College of Science</option>
                    <option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>
                    <option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>
                    <option value='Graduate School'>Graduate School</option>
                  </select>
                </div>
              "; endif; ?>
              <?php if($currentAdminLevel == "college_admin"): 
              echo "
                <input type='text' class='form-control' id='campusAssignment' name='campusAssignment' value='$currentAdminCampus' hidden>
                <input type='text' class='form-control' id='collegeAssignment' name='collegeAssignment' value='$currentCollege' hidden>
              "; endif; ?>
              <div class="form-group mt-2">
                <label for="headline">Headline</label>
                <input type="text" class="form-control" id="headline" name="headline" required>
                <div id="headlineFeedback" class="invalid-feedback">
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                <div id="descriptionFeedback" class="invalid-feedback">
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="formFileMultiple" class="form-label">Multiple files input</label>
                <input class="form-control" type="file" id="fileInput" name="fileInput" multiple required>
                <div id="fileInputFeedback" class="invalid-feedback">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="addBtn" class="btn btn-primary" form="announcementForm" onclick="submitAnnouncementForm()" disabled>Add</button>
          </div>
        </div>
      </div>
    </div>

    <!-- First Login Modal -->
    <?php include "change_pass_modal.php"?>
    
    <?php include "includes/js_cdn.php" ?>
    
    <script>
      
      let id;

    document.getElementById("headline").addEventListener("input", validateForm);
    document.getElementById("description").addEventListener("input", validateForm);
    document.getElementById("fileInput").addEventListener("input", validateForm);
    document.getElementById("campusAssignment").addEventListener("input", validateForm);
    document.getElementById("collegeAssignment").addEventListener("input", validateForm);
    document.getElementById("viewHeadline").addEventListener("input", validateUpdateForm);
    document.getElementById("viewDescription").addEventListener("input", validateUpdateForm);
    document.getElementById("viewCampusAssignment").addEventListener("input", validateUpdateForm);
    document.getElementById("viewCollegeAssignment").addEventListener("input", validateUpdateForm);

    function validateUpdateForm() {
      var headline = document.getElementById("viewHeadline").value;
      var description = document.getElementById("viewDescription").value;
      var fileInput = document.getElementById("viewFileInput").value;
      var campusAssignment = document.getElementById("viewCampusAssignment").value;
      var collegeAssignment = document.getElementById("viewCollegeAssignment").value;

      var isFormValid = headline != "" && description != "" && campusAssignment != "" && collegeAssignment != "";

      document.getElementById("saveBtn").disabled = !isFormValid;
    }

    function validateForm() {
      var headline = document.getElementById("headline").value;
      var description = document.getElementById("description").value;
      var fileInput = document.getElementById("fileInput").value;
      var campusAssignment = document.getElementById("campusAssignment").value;
      var collegeAssignment = document.getElementById("collegeAssignment").value;

      var isFormValid = headline != "" && description != "" && fileInput != "" && campusAssignment != "" && collegeAssignment != "";

      document.getElementById("addBtn").disabled = !isFormValid;
    }

    document.addEventListener("DOMContentLoaded", function () {

        addValidationListener("headline");
        addValidationListener("description");
        addValidationListener("fileInput");

        <?php if ($firstLogin == true): ?>
          var changePass = new bootstrap.Modal(document.getElementById('firstLogin'));
          changePass.show();
        <?php endif; ?>
      });

      function addValidationListener(elementId){
        document.getElementById(elementId).addEventListener("input", function(){
          validateInput(elementId);
        })
      }

      function validateInput(elementId) {
        var inputValue = document.getElementById
        var feedbackMessage = document.getElementById(elementId + "Feedback");

        if (inputValue.length > 0) {
            feedbackMessage.innerText = "";
            document.getElementById(elementId).classList.remove("is-invalid");
            document.getElementById(elementId).classList.add("is-valid");
        } else {
            feedbackMessage.innerText = "This field is required.";
            document.getElementById(elementId).classList.remove("is-valid");
            document.getElementById(elementId).classList.add("is-invalid");
        }

      }

      function viewAnnouncementModal(announcementId) {
        document.getElementById("viewCampusAssignment").disabled = true;
        document.getElementById("viewCollegeAssignment").disabled = true;
        document.getElementById("viewHeadline").disabled = true;
        document.getElementById("viewDescription").disabled = true;
        document.getElementById("viewFileInput").hidden = true;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_announcement.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var data = JSON.parse(this.responseText);
            var ImageURL = data.file_input;
            var description = data.description;
            document.getElementById("announcementId").value = data.announcement_id;
            document.getElementById("viewCampusAssignment").value = data.campus_assignment;
            document.getElementById("viewCollegeAssignment").value = data.college_assignment;
            document.getElementById("viewHeadline").value = data.headline;
            document.getElementById("viewDescription").value = description.replace("<br />", /\n/g);
            document.getElementById("viewAnnouncementImage").src = "uploads/" + data.file_input;
            document.getElementById("viewAuthor").innerHTML = "<small class='text-body-secondary'>Author: </small>" + data.author;
          }
        };

        xhr.send("announcementId=" + announcementId);

        document.getElementById("saveBtn").hidden = true;
        document.getElementById("editViewBtn").hidden = false;

        id = announcementId;

      }

      function editAnnouncement(announcementId) {
        document.getElementById("announcementId").value = announcementId;
        document.getElementById("viewCampusAssignment").disabled = false;
        document.getElementById("viewCollegeAssignment").disabled = false;
        document.getElementById("viewHeadline").disabled = false;
        document.getElementById("viewDescription").disabled = false;
        document.getElementById("viewFileInput").hidden = false;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_announcement.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById("announcementId").value = data.announcement_id;
            document.getElementById("viewCampusAssignment").value = data.campus_assignment;
            document.getElementById("viewCollegeAssignment").value = data.college_assignment;
            document.getElementById("viewHeadline").value = data.headline;
            document.getElementById("viewDescription").textContent = data.description;
            document.getElementById("viewAnnouncementImage").src = "uploads/" + data.file_input;
          }
        };
        xhr.send("announcementId=" + announcementId);

        document.getElementById("saveBtn").hidden = false;
        document.getElementById("editViewBtn").hidden = true;
      }

      function saveChanges() {

        var announcementId = document.getElementById("announcementId").value;
        var campusAssignment = document.getElementById("viewCampusAssignment").value;
        var collegeAssignment = document.getElementById("viewCollegeAssignment").value;
        var headline = document.getElementById("viewHeadline").value;
        var description = document.getElementById("viewDescription").value;

        var file = document.getElementById("viewFileInput").files[0];

        var formData = new FormData();

        formData.append("announcementId", announcementId);
        formData.append("campusAssignment", campusAssignment);
        formData.append("collegeAssignment", collegeAssignment);
        formData.append("headline", headline);
        formData.append("description", description);

        if (file != null) {
          formData.append("fileInput", file);
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_announcement_details.php", true);
        xhr.onreadystatechange = function () {
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("Success: " + xhr.responseText);
            $('#announcementTbl').DataTable().ajax.reload();
          } else {
            console.log("Error: " + xhr.status);
          }
        };

        xhr.send(formData);

        document.getElementById("viewCampusAssignment").disabled = true;
        document.getElementById("viewCollegeAssignment").disabled = true;
        document.getElementById("viewHeadline").readOnly = true;
        document.getElementById("viewDescription").readOnly = true;
        document.getElementById("viewFileInput").disabled = true;

        document.getElementById("saveBtn").hidden = true;
        document.getElementById("editViewBtn").hidden = false;
      }


      function deleteAnnouncement(announcementId) {
        console.log(announcementId);

        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          customClass: {
            popup: 'colored-toast'
          },
          timer: 2000,
        })
        if (confirm("Are you sure you want to delete this announcement?")) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "delete_announcement.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              Toast.fire({
                icon: 'success',
                title: "Announcement deleted successfully!"
              })
              $('#announcementTbl').DataTable().ajax.reload();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Error: " + xhr.status
              })
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

      function test(announcement_id) {
        console.log("test output: ", announcement_id);
      }

      document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("announcementLogo").setAttribute("color", "#ffd700");
      })

      $(document).ready(function () {
      $('#announcementTbl').DataTable({
        paging: false,
        scrollCollapse: true,
        scrollY: '50vh',
        responsive: true,
        autoWidth: false,
        ajax: {
          url: 'get_announcement_list.php',
          dataSrc: '',
          error: function (xhr, error, code) {
            console.log(xhr);
            console.log(error);
            console.log(code);
          },
        },
        columns: [
          { data: 'headline',
            render: function (data, type, row) {
              if (type === 'display') {
                // Set the maximum length for the headline
                var maxLength = 30;
                if (data.length > maxLength) {
                  // If the headline is longer than maxLength, add an ellipsis
                  return data.substr(0, maxLength) + '...';
                } else {
                  return data;
                }
              }
              return data; // For sorting, filtering, etc.
            },
          },
          { data: 'campus_assignment' },
          { data: 'college_assignment' },
          { data: 'author' },
          { data: 'faculty_id' },
          {
                data: 'created_at',
                render: function (data, type, row) {
                    if (type === 'display') {
                        // Format the date using the Date object
                        var date = new Date(data);
                        var formattedDate = date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'short',
                            day: 'numeric',
                            hour12: true,
                        });

                        return formattedDate;
                    }
                    return data; // For sorting, filtering, etc.
                },
            },
          { data: "announcement_id",
            render: function (data) {
              return (
                '<div class="btn-group" role="group">' +
                '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal" onclick="viewAnnouncementModal(' +
                data +
                ')">View</button>' +
                '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal" onclick="editAnnouncement(' +
                data +
                ')">Edit</button>' +
                '<button type="button" class="btn btn-danger" onclick="deleteAnnouncement(' +
                data +
                ')">Archive</button>' +
                '</div>'
              );
            },
          },
        ],
      });
    });
    // Get references to the campus and college select elements
    const campusSelect = document.getElementById('campusAssignment');
    const viewCampusSelect = document.getElementById('viewCampusAssignment');
    const collegeSelect = document.getElementById('collegeAssignment');
    const viewCollegeSelect = document.getElementById('viewCollegeAssignment');

    // Define the available colleges for each campus
    const campusColleges = {
        'Malolos Campus': [
            '-- Select College --',
            'College of Industrial Technology',
            'College of Information and Communications Technology',
            'College of Nursing',
            'College of Hospitality and Tourism Management',
            'College of Education',
            'College of Law',
            'College of Engineering',
            'College of Business Administration',
            'College of Sports, Exercise and Recreation',
            'College of Arts and Letters',
            'College of Science',
            'College of Architecture and Fine Arts',
            'Graduate School',
            'College of Social Sciences and Philosophy',
            'College of Criminal Justice Education'
        ],
        'Meneses Campus': [
          '-- Select College --',
            'College of Education',
            'College of Hospitality Management',
            'College of Engineering',
            'College of Business Administration',
            'College of Information and Communications Technology',
            'College of Industrial Technology'
        ],
        'Hagonoy Campus': [
            'College of Industrial Technology',
            'College of Hospitality and Tourism Management',
            'College of Education',
            'College of Information and Communications Technology'
        ],
        'Bustos Campus': [
            '-- Select College --',
            'College of Engineering',
            'College of Business Administration',
            'College of Information and Communications Technology'
        ],
        'San Rafael Campus': [
            '-- Select College --',
            'College of Nursing',
            'College of Science',
            'College of Social Science and Philosophy'
        ],
        'Sarmiento Campus': [
            '-- Select College --',
            'College of Science',
            'College of Industrial Technology',
            'College of Education',
            'College of Business Administration',
            'College of Hospitality and Tourism Management'
        ]
    };

    // Function to update the college options based on the selected campus
    function updateCollegeOptions() {
        const selectedCampus = campusSelect.value;
        const selectedViewCampus = viewCampusSelect.value;
        viewCollegeSelect.innerHTML = ''; // Clear current options
        collegeSelect.innerHTML = ''; // Clear current options

        if (selectedViewCampus in campusColleges) {
            const colleges = campusColleges[selectedViewCampus];
            for (const college of colleges) {
                const option = document.createElement('option');
                option.value = college;
                option.textContent = college;
                viewCollegeSelect.appendChild(option);
            }
        }

        if (selectedCampus in campusColleges) {
            const colleges = campusColleges[selectedCampus];
            for (const college of colleges) {
                const option = document.createElement('option');
                option.value = college;
                option.textContent = college;
                collegeSelect.appendChild(option);
            }
        }
    }

    // Add an event listener to the campus select element
    viewCampusSelect.addEventListener('change', updateCollegeOptions);
    campusSelect.addEventListener('change', updateCollegeOptions);

    // Initial update when the page loads
    updateCollegeOptions();

    function submitAnnouncementForm (event) {
      event.preventDefault();
      var formData = new FormData(document.getElementById("announcementForm"));
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        customClass: {
          popup: 'colored-toast'
        },
        timer: 2000,
      })
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "add_announcement.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

            Toast.fire({
              icon: 'success',
              title: xhr.responseText
            })
            
            $('#announcementTbl').DataTable().ajax.reload();

            document.getElementById("headline").classList.remove("is-valid");
            document.getElementById("description").classList.remove("is-valid");
            document.getElementById("fileInput").classList.remove("is-valid");


          } else {
            Toast.fire({
              icon: 'error',
              title: "Error: " + xhr.status
            })
          }
        }
      }

      xhr.send(formData);

      document.getElementById("announcementForm").reset();
      document.getElementById("addBtn").disabled = true;

    }

    </script>
    
</body>

</html>