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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="icon" href="resources/virtualbulsu_logo.png" />
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/mobileView.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <style>
        .navbar-custom {
            background-color: #95b302;
            font-family: "Roboto";
        }
        iframe {
            width: 100%;
            height: calc(100vh - 51px); /* Adjusted for the navbar height */
            border: none;
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
            box-shadow: inset 0 0 0 0 #95b302;
            color: #95b302;
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
            box-shadow: inset 150px 0 0 0 #95b302;
        }

        #campuses {
            box-shadow: inset 0 0 0 0 #95b302;
            color: #95b302;
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
            box-shadow: inset 150px 0 0 0 #95b302;
        }

        #offcanvasNavbarLabel {
            color: white;
            font-size: larger;
            margin-left: 5px;
        }

        .dropdown-menu {
            background-color: #95b302;
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
                <a class="navbar-brand custom-brand mx-auto d-lg-none" href="VirtualBulsu_Tour_HomePage.php">
                    <img src="resources\BSU_Hagonoy.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    <span class="navbar-title text-wrap text-white">BulSU - Hagonoy Campus</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li class="nav-item " id="nav-item">
                                    <a class="nav-link" aria-current="page" id="announcementTab" type="button" href="VirtualBulsu_Tour_HomePage.php">Home</a>
                                </li>
                            <li class="nav-item " id="nav-item">
                                <a class="nav-link" aria-current="page" id="announcementTab" type="button" data-bs-toggle="offcanvas" data-bs-target="#announcementPanel" aria-controls="offcanvasScrollingLabel">Announcements</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="campuses">
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
                    <img src="resources\BSU_Hagonoy.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    <span class="navbar-title text-wrap text-white">Bulacan State University - Hagonoy Campus</span>
                </a>
            </div>
        </nav>
        <iframe scrolling="no" id="virtualTour" allow="xr-spatial-tracking; vr; gyroscope; accelerometer; fullscreen; autoplay; xr" scrolling="no" allowfullscreen="true" frameborder="0" src="https://webobook.com/public/650267175030d77e98222f42,en?ap=true&si=true&sm=false&sp=true&sfr=true&sl=true&sop=true&" allowvr="yes"></iframe>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="announcementPanel" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Campus News</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                        // Query to fetch announcements from your database
                        $query = "SELECT * FROM announcements WHERE campus_assignment = 'Bustos Campus' ORDER BY created_at DESC";
                        $result = mysqli_query($con, $query);
        
                        if (!$result) {
                            die("Database query failed."); // Handle the error appropriately
                        }
        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $datePosted = date('F d, Y', strtotime($row['created_at']));
                            echo '
                                <div class="card mb-3" id='.$row['announcement_id'].'>
                                <a href="VirtualBulsu_AnnouncementPage.php?id='.$row['announcement_id'].'" class="text-decoration-none text-body">
                                    <img src="uploads/'.$row['file_input'].'" class="card-img-top" alt="Unable to load image">
                                    <div class="card-body">
                                        <h5 class="card-title">' . htmlspecialchars($row['headline']) . '</h5>
                                    </div>
                                    <div class="card-footer">
                                       <small class="text-body-secondary">Date Posted: '.$datePosted.'<small>
                                       </div>
                                </a>
                                </div>
                            ';
                        }
                        // Release the result set
                        mysqli_free_result($result);
                    ?>
            </div>
        </div>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script>
            var navHeight = document.getElementById("navBar").clientHeight;
            document.getElementById("virtualTour").style.height = "calc(100vh - " + navHeight + "px)"; // 100vh - navHeight
        </script>
</body>

</html>