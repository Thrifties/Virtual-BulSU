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
        <?php include "includes/cdn.php" ?>
        <link rel="stylesheet" href="CSS/navbar.CSS">
        <style>
            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
        </style>
    </head>

    <body>
        <?php include "includes/navbar.php"; ?>

            <div class="container p-3 mt-5 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="card-title">Admin Details</h2>
                                <button class="btn btn-primary" id="editBtn" onclick="enableEdit()">Edit</button>
                                </div>
                                <form id="adminDetailsForm" class="needs-validation">
                                    <div class="form-group mb-3"> <!-- Added mb-3 for spacing -->
                                        <label for="facultyId">Faculty ID:</label>
                                        <input type="text" class="form-control" id="facultyId" value="<?php echo $adminData["faculty_id"]; ?>" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col mb-3"> <!-- Added mb-3 for spacing -->
                                            <label for="name">First Name:</label>
                                            <input type="text" class="form-control" id="firstName" value="<?php echo $adminData["first_name"]; ?>" readonly required>
                                            <div id="firstNameFeedback" class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group col mb-3"> <!-- Added mb-3 for spacing -->
                                            <label for="name">Middle Name:</label>
                                            <input type="text" class="form-control" id="middleName" value="<?php echo $adminData["middle_name"]; ?>" readonly>
                                        </div>
                                        <div class="form-group col mb-3"> <!-- Added mb-3 for spacing -->
                                            <label for="name">Last Name:</label>
                                            <input type="text" class="form-control" id="lastName" value="<?php echo $adminData["last_name"]; ?>" readonly required>
                                            <div id="lastNameFeedback" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3"> <!-- Added mb-3 for spacing -->
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $adminData["email"]; ?>" readonly required>
                                        <div id="emailFeedback" class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group mb-3"> <!-- Added mb-3 for spacing -->
                                        <label for="phone">Contact Number:</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $adminData["contact_num"]; ?>" readonly required>
                                        <div id="phoneFeedback" class="invalid-feedback"></div>
                                    </div>
                                </form>
                            </div>
                    <!-- Include the necessary Bootstrap JavaScript libraries -->
    <?php include "includes/js_cdn.php" ?>
    <script src="js/user_settings_panel.js"></script>
    </body>
</html>