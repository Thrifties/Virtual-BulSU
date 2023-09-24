<?php
require "connect.php"
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Virtual BulSU</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/styles.css">
        <link rel="stylesheet" href="CSS/mobileView.css">
    </head>

    <body>
        <div>
            <!-- Navigation Bar -->
            <nav id="navBar" class="navbar navbar-lg navbar-custom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand custom-brand mx-auto" href="VirtualBulsu_Tour_HomePage.html">
                        <img src="resources\BSU_Logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                        Bulacan State University - Malolos Campus
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-item " id="nav-item">
                                    <a class="nav-link" aria-current="page" id="announcementTab" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#announcementPanel" aria-controls="offcanvasScrollingLabel">Announcements</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="announcementPanel" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Campus News</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
                        // Query to fetch announcements from your database
                        $query = "SELECT * FROM announcements";
                        $result = mysqli_query($con, $query);

                        if (!$result) {
                            die("Database query failed."); // Handle the error appropriately
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="card mb-3" id='.$row['announcement_id'].'>
                                <img src="uploads/'.$row['file_input'].'" class="card-img-top" alt="Unable to load image">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($row['headline']) . '</h5>
                                    <p class="card-text">' . htmlspecialchars($row['description']) . '</p>
                                    <p class="card-text"><small class="text-body-secondary">'.$row['event_date'].'</small></p>
                                </div>
                            </div>
                            ';
                        }
                        // Release the result set
                        mysqli_free_result($result);
                    ?>
                </div>
            </div>
            

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
                crossorigin="anonymous"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>

</html>