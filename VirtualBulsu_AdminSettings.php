<?php
require "connect.php";
require "includes/sessionEnd.php";

$user = $_SESSION["user"];

$query = "SELECT * FROM campus_admin WHERE faculty_id='$user'";
$result = mysqli_query($con, $query);
$adminData = mysqli_fetch_assoc($result);
mysqli_close($con);
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
                        <li class="nav-item">
                            <a class="nav-link" href="VirtualBulsu_SuperAdmin.php">Admins</a>
                        </li>
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
                                <form id="adminDetailsForm">
                                    <div class="form-group">
                                        <label for="facultyId">Faculty ID:</label>
                                        <input type="text" class="form-control" id="facultyId" value="<?php echo $adminData["faculty_id"]; ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="name">First Name:</label>
                                            <input type="text" class="form-control" id="firstName" value="<?php echo $adminData["first_name"]; ?>" readonly>
                                        </div>
                                        <div class="form-group col">
                                            <label for="name">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" value="<?php echo $adminData["middle_name"]; ?>" readonly>
                                        </div>
                                        <div class="form-group col">
                                            <label for="name">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" value="<?php echo $adminData["last_name"]; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="campus">Campus:</label>
                                        <select class="form-control" id="campus" disabled>
                                            <option value="Malolos Campus" <?php if ($adminData["campus"] == "Malolos Campus") echo "selected"; ?>>Malolos Campus</option>
                                            <option value="Bustos Campus" <?php if ($adminData["campus"] == "Bustos Campus") echo "selected"; ?>>Bustos Campus</option>
                                            <option value="Sarmiento Campus" <?php if ($adminData["campus"] == "Sarmiento Campus") echo "selected"; ?>>Sarmiento Campus</option>
                                            <option value="San Rafael Campus" <?php if ($adminData["campus"] == "San Rafael Campus") echo "selected"; ?>>San Rafael Campus</option>
                                            <option value="Hagonoy Campus" <?php if ($adminData["campus"] == "Hagonoy Campus") echo "selected"; ?>>Hagonoy Campus</option>
                                            <option value="Meneses Campus" <?php if ($adminData["campus"] == "Meneses Campus") echo "selected"; ?>>Meneses Campus</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $adminData["email"]; ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Contact Number:</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $adminData["contact_num"]; ?>"
                                            readonly>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- Include the necessary Bootstrap JavaScript libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>
        function enableEdit() {

            // Enable form fields for editing
            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = false;
            document.getElementById("middleName").readOnly = false;
            document.getElementById("lastName").readOnly = false;
            document.getElementById("campus").disabled = false;
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
            var campus = document.getElementById("campus").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;

            // Send an AJAX request to update admin details
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_admin_details.php", true);
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
            document.getElementById("facultyId").readOnly = true;
            document.getElementById("firstName").readOnly = true;
            document.getElementById("middleName").readOnly = true;
            document.getElementById("lastName").readOnly = true;
            document.getElementById("campus").disabled = true;
            document.getElementById("email").readOnly = true;
            document.getElementById("phone").readOnly = true;

            // Change the "Save" button to an "Edit" button
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