<?php
require "connect.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulacan State University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/mobileView.css">
    <style>
    .navbar-custom {
            background-color: #dd4091;
            font-family: 'Roboto';
        }

        #tour {
            width: 100%;
            height: 800px;
            min-height: 562px;
            margin: 0 auto;
        }

        #announcementTab {
            color: black;
        }

        #campuses {
            color: black;
        }

        #offcanvasNavbar, #announcementPanel {
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            transition: width 0.5s;
        }

        .offcanvas-header h5 {
            color: black;
            width: 550px;
            height: 30px;
            margin: 0;
        }

        #announcementTab {
            box-shadow: inset 0 0 0 0 #dd4091;
            color: #dd4091;
            padding: 0 .25rem;
            margin: 0 -.25rem;
            transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
            color: white;
            font-family: 'Roboto';
            font-size: 18px;
            font-weight: 500;
            line-height: 1.5;
            text-decoration: none;
            margin-bottom: 8px;
        }

        #announcementTab:hover {
            color: black;
            box-shadow: inset 150px 0 0 0 #dd4091;
            ;
        }

        #campuses {
            box-shadow: inset 0 0 0 0 #dd4091;
            color: #dd4091;
            padding: 0 .25rem;
            margin: 0 -.25rem;
            transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
            color: white;
            font-family: 'Roboto';
            font-weight: 500;
            line-height: 1.5;
            text-decoration: none;
            font-size: 18px;
        }

        #campuses:hover {
            color: black;
            box-shadow: inset 150px 0 0 0 #dd4091;
        }

        #offcanvasNavbarLabel {
            color: white;
            font-size: larger;
            margin-left: 5px;
            padding-top: 3px;
            font-family: 'Roboto';
        }

        .dropdown-menu {
            background-color: #dd4091;
        }

        .dropdown-item {
            color: white;
        }

        #offcanvasScrollingLabel {
            color: white;
            font-family: 'Roboto';
        }

        .btn-close {
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <!-- Navigation Bar -->
        <nav id="navBar" class="navbar navbar-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand custom-brand mx-auto" href="VirtualBulsu_Tour_HomePage.php">
                    <img src="resources\BSU_Meneses.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Bulacan State University - Meneses Campus
                </a>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item " id="nav-item">
                                <a class="nav-link" aria-current="page" id="announcementTab" type="button" data-bs-toggle="offcanvas" data-bs-target="#announcementPanel" aria-controls="offcanvasScrollingLabel">Announcements</a>
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
            </div>
        </nav>

        <iframe width="100%" height="640" style="width: 100%; height: 640px; border: none; max-width: 100%;" allow="xr-spatial-tracking; vr; gyroscope; accelerometer; fullscreen; autoplay; xr" scrolling="no" allowfullscreen="true" frameborder="0" src="https://webobook.com/public/6502dafcc602223ba112d1b2,en?ap=true&si=true&sm=false&sp=true&sfr=false&sl=false&sop=false&" allowvr="yes"></iframe>



        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="announcementPanel" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Campus News</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                        // Query to fetch announcements from your database
                        $query = "SELECT * FROM announcements WHERE campus_assignment = 'Meneses Campus' ORDER BY event_date DESC";
                        $result = mysqli_query($con, $query);
        
                        if (!$result) {
                            die("Database query failed."); // Handle the error appropriately
                        }
        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <a href="VirtualBulsu_AnnouncementPage.php?id='.$row['announcement_id'].'" class="text-decoration-none text-body">
                                <div class="card mb-3" id='.$row['announcement_id'].'>
                                    <img src="uploads/'.$row['file_input'].'" class="card-img-top" alt="Unable to load image">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($row['headline']) . '</h5>
                                        <p class="card-text"><small class="text-body-secondary">'.$row['event_date'].'</small></p>
                                    </div>
                                </div>
                                </a>
                            ';
                        }
                        // Release the result set
                        mysqli_free_result($result);
                    ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>