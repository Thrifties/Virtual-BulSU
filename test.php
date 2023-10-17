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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    
    <style>
      .admin-panel-container {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#adminModal">Add Admin</button>
          <a href="generate_report_admin.php" class="btn btn-success">Download CSV</a>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Table to display the list of admins -->
    <div class="table-responsive">
      <table class="table table-striped table-hover" id="adminTable">
        <thead>
          <tr>
            <th>Faculty ID</th>
            <th>Full Name</th>
            <?php 
            
            if ($currentAdminLevel === 'super_admin') {
              echo "<th>Campus</th>";
            } elseif ($currentAdminLevel === 'admin') {
              echo "<th>College</th>";
            }
            
            ?>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 

            if ($currentAdminLevel === 'super_admin') {
              $sql = "SELECT * FROM campus_admin WHERE admin_level = 'admin'";

              $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                     if ($row['admin_level'] === 'admin') {
                      echo "<tr id=" . $row['faculty_id'] . ">";
                      echo "<td>" . $row["faculty_id"] . "</td>";
                      echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                      echo "<td>" . $row["campus"] . "</td>";
                      echo "<td>";
                      echo "<button type='button' class='btn btn-primary' id='editBtn' onclick='enableEdit(" . $row['faculty_id'] . ")' data-toggle='modal' data-target='#viewAdminDetails'>Edit</button>";
                      echo "<button type='button' class='btn btn-secondary' id='viewAdmin' data-toggle='modal' data-target='#viewAdminDetails' onclick='selectedRow(" . $row['faculty_id'] . ")'>View</button>";
                      echo "<button type='button' class='btn btn-danger' onclick='deleteAdmin(" . $row['faculty_id'] . ")'>Archive</button>";
                      
                      echo "</td>";
                      echo "</tr>";
                  }
                }
            } 
            } elseif ($currentAdminLevel === 'admin') {
              $sql = "SELECT * FROM college_admin WHERE campus = '$currentAdminCampus'";

              $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                      echo "<tr id=" . $row['faculty_id'] . ">";
                      echo "<td>" . $row["faculty_id"] . "</td>";
                      echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                      echo "<td>" . $row["college"] . "</td>";
                      echo "<td>";
                      echo "<button type='button' class='btn btn-primary' id='editBtn' onclick='enableEditAdmin(" . $row['faculty_id'] . ")' data-toggle='modal' data-target='#viewAdminDetails'>Edit</button>";
                      echo "<button type='button' class='btn btn-secondary' id='viewAdmin' data-toggle='modal' data-target='#viewAdminDetails' onclick='selectedRowAdmin(" . $row['faculty_id'] . ")'>View</button>";
                      echo "<button type='button' class='btn btn-danger' onclick='deleteAdmin(" . $row['faculty_id'] . ")'>Archive</button>";
                      echo "</td>";
                      echo "</tr>";
                }
            }
            }

          ?>
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
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="adminDetailsForm" class="needs-validation">
                <div class="form-group">
                  <label for="facultyId">Faculty ID:</label>
                  <input type="text" class="form-control" id="facultyId" readOnly>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label for="name">First Name:</label>
                      <input type="text" class="form-control" id="viewFirstName">
                    </div>
                    <div class="col">
                      <label for="name">Middle Name:</label>
                      <input type="text" class="form-control" id="viewMiddleName">
                    </div>
                    <div class="col">
                      <label for="name">Last Name:</label>
                      <input type="text" class="form-control" id="viewLastName">
                    </div>
                  </div>
                </div>
                <?php 
                  if ($currentAdminLevel === 'super_admin') {
                    echo "<div class='form-group'>";
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
                    echo "<div class='form-group'>";
                    echo "<label for='campus'>Campus:</label>";
                    echo "<select class='form-control' id='viewCampus'>";
                    echo "<option value='$currentAdminCampus'>$currentAdminCampus</option>";
                    echo "</select>";
                    echo "</div>";
                    echo "<div class='form-group'>";
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
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="viewEmail">
                </div>
                <div class="form-group">
                  <label for="phone">Contact Number:</label>
                  <input type="text" class="form-control" id="viewPhone">
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
  
  <!-- Admin Modal -->
  <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminModalLabel">Add Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" method="post" action="add_admin_details.php">
            <div class="form-group">
              <label for="addFacultyId">Faculty ID:</label>
              <input type="text" class="form-control" name="addFacultyId" id="addFacultyId" onkeyup="checkFacultyId()" value="" pattern="\d+" required>
              <div id="feedbackMessage" class="invalid-feedback">
              </div>
            </div>
            <div class="form-group">
              <label for="addFacultyId">Password:</label>
              <input type="password" class="form-control" name="addPassword" id="addPassword" value="" required>
              <div id="passwordFeedback" class="invalid-feedback">
              </div>
            </div>
            <div class="form-row">
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
                echo "<div class='form-group mt-3' has-validation>";
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
                echo "<div class='form-group mt-3'>";
                echo "<label for='campus'>Campus</label>";
                echo "<select class='form-control' name='addCampus' id='addCampus' required>";
                echo "<option value='$currentAdminCampus'>$currentAdminCampus</option>";
                echo "</select>";
                echo "</div>";
                echo "<div class='form-group mt-3'>";
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

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="addEmail" id="addEmail" required>
              <div id="addEmailFeedback" class="invalid-feedback">
              </div>
            </div>
            <div class="form-group">
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
    <script src="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/admin_panel.js"></script>
  </body>
</html>