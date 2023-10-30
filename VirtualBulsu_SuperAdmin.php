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
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="CSS/navbar.css">
    <?php include "includes/cdn.php"; ?>
    
    <style>
      .admin-panel-container {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      td button {
        margin: 0 3px;
      }
    </style>
  </head>

  <body>
    

  <?php include "includes/navbar.php"; ?>

  <div class="container mt-5">
    <div class="admin-panel-container">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Admin Panel</h2>
        <div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminModal">Add Admin</button>
          <a href="generate_report_admin.php" class="btn btn-success">Download List</a>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Table to display the list of admins -->
    <div class="table-responsive">
      <table id="<?php if($currentAdminLevel == 'admin'){
        echo 'adminTable';
      } elseif ($currentAdminLevel == 'super_admin') {
        echo 'adminTableSuper';
      } ?>" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Faculty ID</th>
                <th>Name</th>
                 <?php 
                  if ($currentAdminLevel === 'super_admin') {
                    echo "<th>Campus</th>";
                  } elseif ($currentAdminLevel === 'admin') {
                    echo "<th>College</th>";
                  }
                  ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
      </table>

    </div>
  </div>

  <!-- View Admin Details Modal -->
  <div class="modal fade" id="viewAdminDetails" tabindex="-1" role="dialog"
        aria-labelledby="adminDetailsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="announcementModalLabel">Announcement Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <form id="adminDetailsForm" class="needs-validation">
                <div class="form-group">
                  <label for="facultyId">Faculty ID:</label>
                  <input type="text" class="form-control" id="facultyId" disabled>
                </div>
                <div class="form-group mt-2">
                  <div class="row">
                    <div class="col">
                      <label for="name">First Name:</label>
                      <input type="text" class="form-control" id="viewFirstName">
                      <div id="viewFirstNameFeedback" class="invalid-feedback">
                      </div>
                    </div>
                    <div class="col">
                      <label for="name">Middle Name:</label>
                      <input type="text" class="form-control" id="viewMiddleName">
                    </div>
                    <div class="col">
                      <label for="name">Last Name:</label>
                      <input type="text" class="form-control" id="viewLastName">
                      <div id="viewLastNameFeedback" class="invalid-feedback">
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                  if ($currentAdminLevel === 'super_admin') {
                    echo "<div class='form-group mt-2'>";
                    echo "<label for='campus'>Campus:</label>";
                    echo "<select class='form-control' id='viewCampus'>";
                    echo "<option value='Malolos Campus'>Malolos Campus</option>";
                    echo "<option value='Bustos Campus'>Bustos Campus</option>";
                    echo "<option value='Sarmiento Campus'>Sarmiento Campus</option>";
                    echo "<option value='San Rafael Campus'>San Rafael Campus</option>";
                    echo "<option value='Hagonoy Campus'>Hagonoy Campus</option>";
                    echo "<option value='Meneses Campus'>Meneses Campus</option>";
                    echo "</select>";
                    echo "</div>";
                  } elseif ($currentAdminLevel === 'admin') {
                    echo "<div class='form-group mt-2'>";
                    echo "<label for='campus'>Campus:</label>";
                    echo "<select class='form-control' id='viewCampus'>";
                    echo "<option value='$currentAdminCampus'>$currentAdminCampus</option>";
                    echo "</select>";
                    echo "</div>";
                    echo "<div class='form-group mt-2'>";
                    echo "<label for='college'>College:</label>";
                    echo "<select class='form-control' id='viewCollege'>";
                    echo "<option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>";
                    echo "<option value='College of Arts and Letters'>College of Arts and Letters</option>";
                    echo "<option value='College of Business Administration'>College of Business Administration</option>";
                    echo "<option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>";
                    echo "<option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>";
                    echo "<option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>";
                    echo "<option value='College of Industrial Technology'>College of Industrial Technology</option>";
                    echo "<option value='College of Law'>College of Law</option>";
                    echo "<option value='College of Nursing'>College of Nursing</option>";
                    echo "<option value='College of Engineering'>College of Engineering</option>";
                    echo "<option value='College of Education'>College of Education</option>";
                    echo "<option value='College of Science'>College of Science</option>";
                    echo "<option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>";
                    echo "<option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>";
                    echo "<option value='Graduate School'>Graduate School</option>";
                    echo "</select>";
                    echo "</div>";
                  }
                ?>
                <div class="form-group mt-2">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="viewEmail">
                  <div id="viewEmailFeedback" class="invalid-feedback">
                  </div>
                </div>
                <div class="form-group mt-2">
                  <label for="phone">Contact Number:</label>
                  <input type="text" class="form-control" id="viewPhone">
                  <div id="viewPhoneFeedback" class="invalid-feedback">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="editViewBtn" class="btn btn-secondary" onclick="enableViewEdit()">Edit</button>
                  <?php 
                    if ($currentAdminLevel === 'super_admin') {
                      echo '<button type="submit" class="btn btn-success" id="saveBtn" onclick="saveChanges()">Save</button>';
                    } elseif ($currentAdminLevel === 'admin') {
                      echo '<button type="submit" class="btn btn-success" id="saveBtn" onclick="saveChangesAdmin()">Save</button>';
                    }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="alert alert-success" id="saveSuccessAlert" style="display: none;">
        Changes have been saved successfully.
      </div>
  
  <!-- Admin Modal -->
  <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminModalLabel">Add Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" method="post" action="add_admin_details.php">
            <div class="form-group mt-2">
              <label for="addFacultyId">Faculty ID:</label>
              <input type="text" class="form-control" name="addFacultyId" id="addFacultyId" onkeyup="checkFacultyId()" value="" pattern="\d+" required>
              <div id="feedbackMessage" class="invalid-feedback">
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="addFacultyId">Password:</label>
              <input type="password" class="form-control" name="addPassword" id="addPassword" value="" required>
              <div id="passwordFeedback" class="invalid-feedback">
              </div>
            </div>
            <div class="form-row mt-2">
              <div class="col">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" required>
                <div id="firstNameFeedback" class="invalid-feedback">
                </div>
              </div>
              <div class="col">
                <label for="middleName">Middle Name</label>
                <input type="text" class="form-control" name="middleName" id="middleName">
              </div>
              <div class="col">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" required>
                <div id="lastNameFeedback" class="invalid-feedback">
                </div>
              </div>
            </div>

            <?php 
              if ($currentAdminLevel === 'super_admin') {
                echo "<div class='form-group mt-2' has-validation>";
                echo "<label for='campus'>Campus</label>";
                echo "<select class='form-control' name='addCampus' id='addCampus' required>";
                echo "<option value='' selected disabled> -- Select Campus -- </option>";
                echo "<option value='Malolos Campus'>Malolos Campus</option>";
                echo "<option value='Bustos Campus'>Bustos Campus</option>";
                echo "<option value='Sarmiento Campus'>Sarmiento Campus</option>";
                echo "<option value='San Rafael Campus'>San Rafael Campus</option>";
                echo "<option value='Hagonoy Campus'>Hagonoy Campus</option>";
                echo "<option value='Meneses Campus'>Meneses Campus</option>";
                echo "</select>";
                echo '<div id="addCampusFeedback" class="invalid-feedback"></div>';
                echo "</div>";
              } elseif ($currentAdminLevel === 'admin') {
                echo "<div class='form-group mt-2'>";
                echo "<label for='campus'>Campus</label>";
                echo "<select class='form-control' name='addCampus' id='addCampus' required>";
                echo "<option value='$currentAdminCampus'>$currentAdminCampus</option>";
                echo "</select>";
                echo "</div>";
                echo "<div class='form-group mt-2'>";
                echo "<label for='college'>College</label>";
                echo "<select class='form-control' name='addCollege' id='addCollege' requied>";
                echo "<option value='College of Architecture and Fine Arts'>College of Architecture and Fine Arts</option>";
                echo "<option value='College of Arts and Letters'>College of Arts and Letters</option>";
                echo "<option value='College of Business Administration'>College of Business Administration</option>";
                echo "<option value='College of Criminal Justice Education'>College of Criminal Justice Education</option>";
                echo "<option value='College of Hospitality and Tourism Management'>College of Hospitality and Tourism Management</option>";
                echo "<option value='College of Information and Communications Technology'>College of Information and Communications Technology</option>";
                echo "<option value='College of Industrial Technology'>College of Industrial Technology</option>";
                echo "<option value='College of Law'>College of Law</option>";
                echo "<option value='College of Nursing'>College of Nursing</option>";
                echo "<option value='College of Engineering'>College of Engineering</option>";
                echo "<option value='College of Education'>College of Education</option>";
                echo "<option value='College of Science'>College of Science</option>";
                echo "<option value='College of Sports, Exercise and Recreation'>College of Sports, Exercise and Recreation</option>";
                echo "<option value='College of Social Sciences and Philosophy'>College of Social Sciences and Philosophy</option>";
                echo "<option value='Graduate School'>Graduate School</option>";
                echo "</select>";
                echo '<div id="addCollegeFeedback" class="invalid-feedback"></div>';
                echo "</div>";

              }
            ?>

            <div class="form-group mt-2">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="addEmail" id="addEmail" required>
              <div id="addEmailFeedback" class="invalid-feedback">
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="phone">Contact Number</label>
              <input type="text" class="form-control" name="addPhone" id="addPhone" required>
              <div id="addPhoneFeedback" class="invalid-feedback">
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="addBtn" disabled>Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php 
  
  include "includes/js_cdn.php"; 
  
  ?>
  <script>

    document.getElementById("addFacultyId").addEventListener("input", validateForm);
document.getElementById("addPassword").addEventListener("input", validateForm);
document.getElementById("firstName").addEventListener("input", validateForm);
document.getElementById("lastName").addEventListener("input", validateForm);
document.getElementById("addEmail").addEventListener("input", validateForm);
document.getElementById("addPhone").addEventListener("input", validateForm);

document.getElementById("viewFirstName").addEventListener("input", validateUpdateForm);
document.getElementById("viewLastName").addEventListener("input", validateUpdateForm);
document.getElementById("viewEmail").addEventListener("input", validateUpdateForm);
document.getElementById("viewPhone").addEventListener("input", validateUpdateForm);

document.addEventListener("DOMContentLoaded", function () {

  document.getElementById("addPassword").addEventListener("onkeyup", function () {
      validatePassword();
  });

  addValidationListener("firstName");
  addValidationListener("lastName");
  addValidationListener("addEmail");
  addValidationListener("addPhone");
  addValidationListener("viewFirstName");
  addValidationListener("viewLastName");
  addValidationListener("viewEmail");
  addValidationListener("viewPhone");
  addValidationListener("addCampus");

});

function addValidationListener(elementId) {
  document.getElementById(elementId).addEventListener("keyup", function () {
      validateInput(elementId);
  });
}

function validateInput(elementId) {
  var inputValue = document.getElementById(elementId).value;
  var feedbackMessage = document.getElementById(elementId + "Feedback");

  if (elementId.value === "" && elementId !== "middleName") {
      elementId.classList.add("is-invalid");
      feedbackMessage.innerHTML = "This field is required.";
      document.getElementById("addBtn").disabled = true;
      return false;
  } else {
      var pattern;
      switch (elementId) {
          case "firstName":
              pattern = /^[a-zA-Z]+$/;
              break;
          case "lastName":
              pattern = /^[a-zA-Z]+$/;
              break;
          case "addEmail":
              pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              break;
          case "addPhone":
              pattern = /^\d{11}$/;
              break;
          case "viewFirstName":
              pattern = /^[a-zA-Z]+$/;
              break;
          case "viewLastName":
              pattern = /^[a-zA-Z]+$/;
              break;
          case "viewEmail":
              pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              break;
          case "viewPhone":
              pattern = /^\d{11}$/;
              break;
          default:
              pattern = /.*/;
      }

      if (!pattern.test(inputValue)) {
          document.getElementById(elementId).classList.add("is-invalid");
          feedbackMessage.innerHTML = "Invalid format.";
          document.getElementById("addBtn").disabled = true;
          return false;
      } else {
          document.getElementById(elementId).classList.remove("is-invalid");
          document.getElementById(elementId).classList.add("is-valid");
          feedbackMessage.innerHTML = "";
          // Enable or disable the button based on whether all required fields are filled
          var isFormValid = validateForm();
          document.getElementById("addBtn").disabled = !isFormValid;
          return true;
      }
  }

  /* if (inputValue.length > 0) {
      feedbackMessage.innerText = "";
      document.getElementById(elementId).classList.remove("is-invalid");
      document.getElementById(elementId).classList.add("is-valid");
  } else {
      feedbackMessage.innerText = "This field is required.";
      document.getElementById(elementId).classList.remove("is-valid");
      document.getElementById(elementId).classList.add("is-invalid");
  } */
}

function validateUpdateForm() {
    var firstName = document.getElementById("viewFirstName").value;
    var lastName = document.getElementById("viewLastName").value;
    var email = document.getElementById("viewEmail").value;
    var phone = document.getElementById("viewPhone").value;

    var isFormValid = firstName !== "" && lastName !== "" && email !== "" && phone !== "";

    document.getElementById("saveBtn").disabled = !isFormValid;
}

function validateForm() {
    var facultyId = document.getElementById("addFacultyId").value;
    var password = document.getElementById("addPassword").value;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("addEmail").value;
    var phone = document.getElementById("addPhone").value;


    var isFormValid = facultyId !== "" && password !== "" && firstName !== "" && lastName !== "" && email !== "" && phone !== "";
    document.getElementById("addBtn").disabled = !isFormValid;
}




function validatePassword() {
  var password = document.getElementById("addPassword").value;
  var feedbackMessage = document.getElementById("passwordFeedback");

  if (password.length >= 8 && password.length <= 25) {
      feedbackMessage.innerText = "Looks good!";
      document.getElementById("addPassword").classList.remove("is-invalid");
      document.getElementById("addPassword").classList.add("is-valid");
  } else {
      feedbackMessage.innerText = "Password should be between 8 and 25 characters.";
      document.getElementById("addPassword").classList.remove("is-valid");
      document.getElementById("addPassword").classList.add("is-invalid");
  }
}

function checkFacultyId() {
var facultyIdInput = document.getElementById("addFacultyId");
var facultyId = facultyIdInput.value;

// Check if facultyId contains only numbers
var numericRegex = /^\d+$/;
if (numericRegex.test(facultyId)) {
  // Check if the facultyId has 10 digits
  if (facultyId.length === 10) {
      var xhr = new XMLHttpRequest();

      xhr.open('GET', 'checkFacultyId.php?faculty_id=' + facultyId, true);

      xhr.send();

      xhr.onload = function () {
          if (xhr.status == 200) {
              var feedbackMessage = document.getElementById("feedbackMessage");
              if (xhr.responseText === "Faculty ID is already taken.") {
                  facultyIdInput.classList.remove("is-valid");
                  facultyIdInput.classList.add("is-invalid");
                  feedbackMessage.innerText = xhr.responseText;
              } else {
                  facultyIdInput.classList.remove("is-invalid");
                  facultyIdInput.classList.add("is-valid");
                  feedbackMessage.innerText = "";
              }
          } else {
              console.error('Request failed. Returned status of ' + xhr.status);
          }
      };
  } else {
      // If the faculty ID doesn't have 10 digits, mark it as invalid
      facultyIdInput.classList.remove("is-valid");
      facultyIdInput.classList.add("is-invalid");
      document.getElementById("feedbackMessage").innerText = "Faculty ID must have 10 digits.";
  }
} else {
  // If the faculty ID contains non-numeric characters, mark it as invalid
  facultyIdInput.classList.remove("is-valid");
  facultyIdInput.classList.add("is-invalid");
  document.getElementById("feedbackMessage").innerText = "Faculty ID must contain only numbers.";
}
}


function selectedRowAdmin (facultyId){ 

  console.log("View button clicked for faculty ID:", facultyId);
  
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewCollege").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewCollege").value = facultyData.college;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  document.getElementById("facultyId").value = data;

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);
}
function selectedRow (facultyId){
  
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  document.getElementById("facultyId").value = facultyId;

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

}

function enableViewEdit(){
  enableEdit(document.getElementById("facultyId").value);
}

  function enableEditAdmin(facultyId) {
  console.log("Edit button clicked for faculty ID:", facultyId);
  // Enable form fields for editing
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = false;
  document.getElementById("viewMiddleName").disabled = false;
  document.getElementById("viewLastName").disabled = false;
  document.getElementById("viewCampus").disabled = false;
  document.getElementById("viewCollege").disabled = false;
  document.getElementById("viewEmail").disabled = false;
  document.getElementById("viewPhone").disabled = false;

  document.getElementById("facultyId").value = facultyId;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      // Populate form fields with the fetched faculty data
      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewCollege").value = facultyData.college;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

  // Change the "Edit" button to a "Save" button
  document.getElementById("saveBtn").disabled = false;
  var saveBtn = document.getElementById("saveBtn");
  saveBtn.onclick = saveChangesAdmin;
}

function enableEdit(facultyId) {
  // Enable form fields for editing
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = false;
  document.getElementById("viewMiddleName").disabled = false;
  document.getElementById("viewLastName").disabled = false;
  document.getElementById("viewCampus").disabled = false;
  document.getElementById("viewEmail").disabled = false;
  document.getElementById("viewPhone").disabled = false;

  document.getElementById("facultyId").value = facultyId;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_admin_details.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var facultyData = JSON.parse(xhr.responseText);

      // Populate form fields with the fetched faculty data
      document.getElementById("facultyId").value = facultyData.faculty_id;
      document.getElementById("viewFirstName").value = facultyData.first_name;
      document.getElementById("viewMiddleName").value = facultyData.middle_name;
      document.getElementById("viewLastName").value = facultyData.last_name;
      document.getElementById("viewCampus").value = facultyData.campus;
      document.getElementById("viewEmail").value = facultyData.email;
      document.getElementById("viewPhone").value = facultyData.contact_num;
    }
  };

  // Send the id to the server
  xhr.send("facultyId="+ facultyId);

  // Change the "Edit" button to a "Save" button
  document.getElementById("saveBtn").disabled = false;
  var saveBtn = document.getElementById("saveBtn");
  saveBtn.onclick = saveChanges;
}

function saveChanges() {
  
  var facultyId = document.getElementById("facultyId").value;
  var firstName = document.getElementById("viewFirstName").value;
  var middleName = document.getElementById("viewMiddleName").value;
  var lastName = document.getElementById("viewLastName").value;
  var campus = document.getElementById("viewCampus").value;
  var email = document.getElementById("viewEmail").value;
  var phone = document.getElementById("viewPhone").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_admin.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
  if (xhr.readyState === 4) {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        alert(response.success);
      } else {
        alert(response.error);
      }
    } else {
      alert("Error updating admin details. Please try again later.");
    }
  }
  };

  // Send the updated admin data to the server
  xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&campus=" + campus + "&email=" + email + "&phone=" + phone);

  // Disable form fields after saving
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");
  document.getElementById("saveBtn").disabled = true;
  document.getElementById("facultyId").disabled = true;

}

function saveChangesAdmin() {

  var facultyId = document.getElementById("facultyId").value;
  var firstName = document.getElementById("viewFirstName").value;
  var middleName = document.getElementById("viewMiddleName").value;
  var lastName = document.getElementById("viewLastName").value;
  var campus = document.getElementById("viewCampus").value;
  var college = document.getElementById("viewCollege").value;
  var email = document.getElementById("viewEmail").value;
  var phone = document.getElementById("viewPhone").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_admin_college.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
  if (xhr.readyState === 4) {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        alert(response.success);
      } else {
        alert(response.error);
      }
    } else {
      alert("Error updating admin details. Please try again later.");
    }
  }
  };

  // Send the updated admin data to the server
  xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&campus=" + campus + "&college=" + college + "&email=" + email + "&phone=" + phone);

  // Disable form fields after saving
  document.getElementById("facultyId").disabled = true;
  document.getElementById("viewFirstName").disabled = true;
  document.getElementById("viewMiddleName").disabled = true;
  document.getElementById("viewLastName").disabled = true;
  document.getElementById("viewCampus").disabled = true;
  document.getElementById("viewCollege").disabled = true;
  document.getElementById("viewEmail").disabled = true;
  document.getElementById("viewPhone").disabled = true;

  var saveBtn = document.getElementById("saveBtn");

  document.getElementById("saveBtn").disabled = true;
  document.getElementById("facultyId").disabled = true;
}

function deleteAdmin(facultyId) {
    var confirmation = confirm("Are you sure you want to delete this admin?");
    if (confirmation) {
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_admin.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define a callback function to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                alert(response.success);
                // Find and remove the deleted admin's row from the table
                var rowToRemove = document.getElementById("row_" + facultyId);
                if (rowToRemove) {
                    rowToRemove.remove();
                }
              } else {
                  alert(response.error);
                }
            }
        };

        // Send the request with faculty_id parameter
        xhr.send("faculty_id=" + facultyId);
    }
}

function logout(){
  window.location.href = "logout.php";
}


  $(document).ready(function () {
  $("#adminTable").DataTable({
    responsive: true,
    autoWidth: false,
    ajax: {
      url: "get_admins.php",
      dataSrc: "",
      error: function (xhr, error, thrown) {
      console.log("DataTables error:", error, thrown);
    }
    },
    columns: [
      { data: "faculty_id" },
      { data: null,
        render: function (data, type, row) {
          return row.first_name + " " + row.last_name;
        }
      },
      { data: "college" },
      { data: "faculty_id",
        render: function (data) {
          return (
            '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="selectedRowAdmin(' +
            data +
            ')">View</button>' +
            '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="enableEditAdmin(' +
            data +
            ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onclick="deleteAdmin(' +
            data +
            ')">Delete</button>'
          );
        },
      },
    ],
  });
});

  $(document).ready(function () {
  $("#adminTableSuper").DataTable({
    responsive: true,
    autoWidth: false,
    searching: true,
    processing: true,
    ajax: {
      url: "get_admins.php",
      dataSrc: "",
      error: function (xhr, error, thrown) {
      console.log("DataTables error:", error, thrown);
    }
    },
    columns: [
      { data: "faculty_id" },
      { data: null,
        render: function (data, type, row) {
          return row.first_name + " " + row.last_name;
        }
      },
      { data: "campus" },
      { data: "faculty_id",
        render: function (data) {
          return (
            '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="selectedRow(' +
            data +
            ')">View</button>' +
            '<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewAdminDetails" onclick="enableEdit(' +
            data +
            ')">Edit</button>' +
            '<button type="button" class="btn btn-danger" onclick="deleteAdmin(' +
            data +
            ')">Delete</button>'
          );
        },
      },
    ],
  });
});
  </script>
  </body>
</html>