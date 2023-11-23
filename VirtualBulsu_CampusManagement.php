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
        <?php include "includes/cdn.php"; ?>
        <link rel="stylesheet" href="CSS/navbar.css">
        <link rel="stylesheet" href="CSS/management_panel.css">
    </head>

    <body>

        <?php include "includes/navbar.php"; ?>

        <div class="container-fluid mt-5" id="campusManagementPage">
            <div class="campus-panel">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-center">Campus Management Panel</h1>
                    <button class="btn btn-primary" id="addCampusBtn">Add Campus</button>
                </div>
                <div class="container d-flex flex-column align-items-center">
                    <div class="row">
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
                            <div class="card-body">
                                <h5 class="card-title text-center">Malolos Campus</h5>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>


        <?php include "includes/js_cdn.php"; ?>
        <script src="JS/campus_management_panel.js"></script>
    </body>
</html>