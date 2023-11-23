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
                    <h2>Campus Management Panel</h2>

                <div class="container row row-cols-3 mx-auto">
    <!-- Malolos Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="Malolos Campus">
            <img src="resources/campus_malolos.png" class="card-img-top" alt="Malolos Campus">
            <div class="card-body">
                <h5 class="card-title text-center">Malolos Campus</h5>
            </div>
        </div>
    </div>

    <!-- Bustos Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="Bustos Campus">
            <img src="resources/campus_bustos.png" class="card-img-top" alt="Bustos Campus">
            <div class="card-body">
                <h5 class="card-title text-center">Bustos Campus</h5>
            </div>
        </div>
    </div>

    <!-- Hagonoy Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="Hagonoy Campus">
            <img src="resources/campus_hagonoy.png" class="card-img-top" alt="Hagonoy Campus">
            <div class="card-body">
                <h5 class="card-title text-center">Hagonoy Campus</h5>
            </div>
        </div>
    </div>

    <!-- Meneses Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="Meneses Campus">
            <img src="resources/campus_meneses.png" class="card-img-top" alt="Meneses Campus">
            <div class="card-body">
                <h5 class="card-title text-center">Meneses Campus</h5>
            </div>
        </div>
    </div>

    <!-- Sarmiento Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="Sarmiento Campus">
            <img src="resources/campus_sarmiento.png" class="card-img-top" alt="Sarmiento Campus">
            <div class="card-body">
                <h5 class="card-title text-center">Sarmiento Campus</h5>
            </div>
        </div>
    </div>

    <!-- San Rafael Campus -->
    <div class="col">
        <div class="card shadow" data-bs-toggle="modal" data-bs-target="#campusCollegeList" data-bs-campus="San Rafael Campus">
            <img src="resources/campus_sanrafael.png" class="card-img-top" alt="San Rafael Campus">
            <div class="card-body">
                <h5 class="card-title text-center">San Rafael Campus</h5>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>

        <?php include "includes/campus_college_list.php"; ?>
        <?php include "includes/js_cdn.php"; ?>
        <script src="JS/campus_management_panel.js"></script>
    </body>
</html>