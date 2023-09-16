<?php
require "connect.php";
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
                            <a class="nav-link" href="VirtualBulsu_AnnouncementPanel.html">Announcements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VirtualBulsu_SuperAdmin.html">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="VirtualBulsu_AdminSettings.html">
                                <span class="user-icon">
                                    <!-- <i class='bx bx-user'></i> -->
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="admin-panel-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Admin Panel</h2>
                    <button class="btn btn-primary" id="editBtn" data-toggle="modal" data-target="#adminModal" onclick="enableEdit()">Edit</button>
                </div>
                
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Admin Details</h5>
                                <form id="adminDetailsForm">
                                    <div class="form-group">
                                        <label for="facultyId">Faculty ID:</label>
                                        <input type="text" class="form-control" id="facultyId" value="1234567890"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" value="John Doe" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="campus">Campus:</label>
                                        <select class="form-control" id="campus" disabled>
                                            <option value="Malolos - Main Campus">Malolos - Main Campus</option>
                                            <option value="Bustos Campus">Bustos Campus</option>
                                            <option value="Sarmiento Campus">Sarmiento Campus</option>
                                            <option value="San Rafael Campus">San Rafael Campus</option>
                                            <option value="Hagonoy Campus">Hagonoy Campus</option>
                                            <option value="Meneses Campus">Meneses Campus</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" value="johndoe@example.com"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Contact Number:</label>
                                        <input type="text" class="form-control" id="phone" value="123-456-7890"
                                            readonly>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- Include the necessary Bootstrap JavaScript libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>
        function enableEdit(facultyId) {
            // Enable form fields for editing
            document.getElementById("facultyId").readOnly = true;
            document.getElementById("viewFirstName").readOnly = false;
            document.getElementById("viewMiddleName").readOnly = false;
            document.getElementById("viewLastName").readOnly = false;
            document.getElementById("viewCampus").disabled = false;
            document.getElementById("viewEmail").readOnly = false;
            document.getElementById("viewPhone").readOnly = false;

            /* var row = document.getElementById(facultyId);
            row.classList.add("table-active"); */

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
            // Get updated admin data
            var facultyId = document.getElementById("facultyId").value;
            var firstName = document.getElementById("viewFirstName").value;
            var middleName = document.getElementById("viewMiddleName").value;
            var lastName = document.getElementById("viewLastName").value;
            var campus = document.getElementById("viewCampus").value;
            var email = document.getElementById("viewEmail").value;
            var phone = document.getElementById("viewPhone").value;

            /* var row = document.getElementById(facultyId);
            row.classList.remove("table-active"); */

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
            document.getElementById("viewFirstName").readOnly = true;
            document.getElementById("viewMiddleName").readOnly = true;
            document.getElementById("viewLastName").readOnly = true;
            document.getElementById("viewCampus").disabled = true;
            document.getElementById("viewEmail").readOnly = true;
            document.getElementById("viewPhone").readOnly = true;

            var saveBtn = document.getElementById("saveBtn");
            document.getElementById("saveBtn").disabled = true;
            document.getElementById("facultyId").readOnly = true;
        }

        </script>
    </body>
</html>