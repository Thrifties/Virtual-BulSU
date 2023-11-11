<?php
require "connect.php";

$query = "SELECT * FROM announcements WHERE campus_assignment = 'Malolos Campus' ORDER BY created_at DESC";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {{
      $college = $row['college_assignment'];
      $campus = $row['campus_assignment'];
      $campusId = str_replace(' ', '', $campus);
      $collegeId = str_replace(' ', '', $college);
      $datePosted = date('F d, Y', strtotime($row['created_at']));
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Virtual BulSU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="icon" href="resources/Virtual BulSU Logo.png" type="image/x-icon">
        <link rel="stylesheet" href="CSS/styles.css">
        <link rel="stylesheet" href="CSS/mobileView.css">
        <style>

            #announcementTab, #campuses {
                box-shadow: inset 0 0 0 0 #763435;
                color: #fff;
            }

            #announcementTab:hover, #campuses:hover {
                color: #d09b00;
                box-shadow: inset 150px 0 0 0 #763435;
            }
        </style>
    </head>

    <body>
            <nav id="navBar" class="navbar navbar-lg navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand custom-brand mx-auto d-lg-none" href="VirtualBulsu_Tour_HomePage.php">
                        <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                        <span class="navbar-title text-wrap text-white">BulSU - Malolos Campus</span>
                    </a>
                    <button class="navbar-toggler order-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-item " id="nav-item">
                                    <a class="nav-link" aria-current="page" id="announcementTab" type="button" href="VirtualBulsu_Tour_HomePage.php">Home</a>
                                </li>
                                <li class="nav-item " id="nav-item">
                                    <a class="nav-link" aria-current="page" id="announcementTab" type="button" data-bs-toggle="modal"
                                        data-bs-target="#<?php echo $campusId ?>">Announcements</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="campuses" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Campuses
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_Malolos.php">Malolos Campus</a></li>
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_Bustos.php">Bustos Campus</a></li>
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_Meneses.php">Meneses Campus</a></li>
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_Sarmiento.php">Sarmiento Campus</a></li>
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_Hagonoy.php">Hagonoy Campus</a></li>
                                        <li><a class="dropdown-item" href="VirtualBulsu_Tour_SanRafael.php">San Rafael Campus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="navbar-brand custom-brand mx-auto d-none d-lg-block" href="VirtualBulsu_Tour_HomePage.php">
                        <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                        <span class="navbar-title text-wrap text-white">Bulacan State University - Malolos Campus</span>
                    </a>
                </div>
            </nav>
                <iframe class="object-fit-contain" allowvr="yes" allow="xr-spatial-tracking;vr;gyroscope;accelerometer;fullscreen;" scrolling="no" allowfullscreen="true"  frameborder="0" src="https://webobook.com/public/650e85d4ac66aa5ca84ef742,en?ap=true&si=true&sm=false&sp=true&sfr=false&sl=false&sop=false&" ></iframe>
            
                <!-- Include Campus Announcement Modal -->
                <?php include "campus_announcement_modal.php"; ?>

                <!-- Include Footer -->
                <?php include "includes/footer.php"; ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>

</html>