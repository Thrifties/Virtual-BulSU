<?php
require "connect.php";
require "includes/sessionEnd.php";



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
    $currentAdminLevel = $adminData["admin_level"];
} else {
    // If user is not found in campus_admin, check college_admin
    $stmt = $con->prepare($collegeAdminQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
            $adminData = mysqli_fetch_assoc($result);
            $currentAdminLevel = $adminData["admin_level"];
        } else {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Admin Settings</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="includes\VirtualBulsu_Navbar.css">
        <style>
            .admin-panel-container {
                border: 1px solid #ddd;
                padding: 20px;
                border-radius: 5px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand custom-brand" href="#">
                    <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Bulacan State University
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="VirtualBulsu_AnnouncementPanel.php">Announcements</a>
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
                        <li class="nav-item" id="custom-item">
                            <a class="nav-link data-custom" href="#" onclick="logout()">Log Out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VirtualBulsu_AdminSettings.php">User Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="admin-panel-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Admin Panel</h2>
                    <button class="btn btn-primary" id="editBtn" onclick="enableEdit()">Edit</button>
                </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Admin Details</h5>
                                <form id="adminDetailsForm" class="needs-validation">
                                    <div class="form-group">
                                        <label for="facultyId">Faculty ID:</label>
                                        <input type="text" class="form-control" id="facultyId" value="<?php echo $adminData["faculty_id"]; ?>" readonly>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="name">First Name:</label>
                                            <input type="text" class="form-control" id="firstName" value="<?php echo $adminData["first_name"]; ?>" readonly required>
                                            <div id="firstNameFeedback" class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label for="name">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" value="<?php echo $adminData["middle_name"]; ?>" readonly>
                                        </div>
                                        <div class="form-group col">
                                            <label for="name">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" value="<?php echo $adminData["last_name"]; ?>" readonly required>
                                            <div id="lastNameFeedback" class="invalid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $adminData["email"]; ?>"
                                            readonly required>
                                        <div id="emailFeedback" class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Contact Number:</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $adminData["contact_num"]; ?>"
                                            readonly required>
                                        <div id="phoneFeedback" class="invalid-feedback">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- Include the necessary Bootstrap JavaScript libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            addValidationListener("firstName");
            addValidationListener("lastName");
            addValidationListener("email");
            addValidationListener("phone");
        });

        function addValidationListener(elementId) {
            document.getElementById(elementId).addEventListener("keyup", function () {
                validate(elementId);
            });
        }

    function validate(elementId) {
    var element = document.getElementById(elementId);
    var feedbackElement = document.getElementById(elementId + "Feedback");

    if (element.value === "" && elementId !== "middleName") {
        element.classList.add("is-invalid");
        feedbackElement.innerHTML = "This field is required.";
        document.getElementById("editBtn").disabled = true;
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
            case "email":
                pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                break;
            case "phone":
                pattern = /^\d{11}$/;
                break;
            default:
                pattern = /.*/;
        }

        if (!pattern.test(element.value)) {
            element.classList.add("is-invalid");
            feedbackElement.innerHTML = "Invalid format.";
            document.getElementById("editBtn").disabled = true;
            return false;
        } else {
            element.classList.remove("is-invalid");
            feedbackElement.innerHTML = "";
            // Enable or disable the button based on whether all required fields are filled
            var isFormValid = validateForm();
            document.getElementById("editBtn").disabled = !isFormValid;
            return true;
        }
    }
}

function validateForm() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    // Check if all required fields are filled
    var isFormValid = firstName !== "" && lastName !== "" && email !== "" && phone !== "";
    return isFormValid;
}


        function enableEdit() {

            // Enable form fields for editing
            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = false;
            document.getElementById("middleName").readOnly = false;
            document.getElementById("lastName").readOnly = false;
            document.getElementById("email").readOnly = false;
            document.getElementById("phone").readOnly = false;

            // Change the "Edit" button to a "Save" button
            var editBtn = document.getElementById("editBtn");
            editBtn.innerHTML = "Save";
            editBtn.className = "btn btn-success";
            editBtn.onclick = saveChanges;
        }

        function saveChanges() {

            // Get updated admin data
            var facultyId = document.getElementById("facultyId").value;
            var firstName = document.getElementById("firstName").value;
            var middleName = document.getElementById("middleName").value;
            var lastName = document.getElementById("lastName").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;

            // Send an AJAX request to update admin details
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_user_details.php", true);
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

            xhr.send("facultyId=" + facultyId + "&firstName=" + firstName + "&middleName=" + middleName + "&lastName=" + lastName + "&email=" + email + "&phone=" + phone);

            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = true;
            document.getElementById("middleName").readOnly = true;
            document.getElementById("lastName").readOnly = true;
            document.getElementById("email").readOnly = true;
            document.getElementById("phone").readOnly = true;

            var editBtn = document.getElementById("editBtn");
            editBtn.innerHTML = "Edit";
            editBtn.className = "btn btn-primary";
            editBtn.onclick = enableEdit;
        }

        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "logout.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href = "VirtualBulsu_Login.php";
            }
            };

            // Send the id to the server
            xhr.send();
        }

        </script>
    </body>
</html>