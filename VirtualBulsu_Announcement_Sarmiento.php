<?php 
require "connect.php";

$query = "SELECT * FROM announcements WHERE campus_assignment = 'Sarmiento Campus' ORDER BY created_at DESC" ;
$result = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bulacan State University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="includes\VirtualBulsu_Navbar.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <style>
      html,
      body {
        height: 100%;
      }

      body {
        background: /*linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.932)),*/
          url("resources/cover.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        /*backdrop-filter: blur(2px); */
      }

      #VTIntroduction {
        color: white;
        top: 30%;
      }

      #line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 6; /* Adjust the number of lines as needed */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .navbar-custom {
        /*background: rgba(255, 255, 255, 0.3);*/
        z-index: 9999;
        width: 100%;
        background: none;
        background-color: #763435;
        /*border: 1px solid#f7f7f7; */
        font-family: "Roboto";
      }
      .navbar-custom .navbar-brand {
        color: aliceblue;
        text-decoration: none;
        font-family: "Roboto";
        /* Remove underline */
      }
      .navbar-custom {
                background-color: #763435;
                z-index: 9999;
                width: 100%;
            }

    .navbar-custom .navbar-nav #news-link:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: rgba(255, 215, 0, 1);
            transition: background-color 0.3s ease;
        }

    .navbar-custom .navbar-nav #news-link {
            color: #ffd700;
        }

      .footer {
        /*background: none;*/
        background-color: #763435;
        color: white;
        padding: 5px;
        text-align: center;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
      }


@media (max-width: 500px){
    h1{
        font-size: 35px;
    }

    nav {
        display: block;
        width: 100% !important;
    }

}
</style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid d-flex justify-content-start">
        <a class="navbar-brand custom-brand" href="VirtualBulsu_Tour_HomePage.php">
          <img
            src="resources\virtualbulsu_logo.png"
            alt="Logo"
            width="80"
            height="auto"
            class="d-inline-block align-top"
          />
          <!-- Virtual BulSU -->
        </a>

      <ul class="navbar-nav">
        <li class="nav-tem">
          <a class="nav-link" id="home-link" href="VirtualBulsu_Tour_HomePage.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="campus-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Campuses
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Bustos.php">Bustos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Hagonoy.php">Hagonoy Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Malolos.php">Malolos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_SanRafael.php">San Rafael Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Sarmiento.php">Sarmiento Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Meneses.php">Meneses Campus</a></li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="news-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            News
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_Bustos.php">Bustos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_Hagonoy.php">Hagonoy Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_Malolos.php">Malolos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_SanRafael.php">San Rafael Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_Sarmiento.php">Sarmiento Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Announcement_Meneses.php">Meneses Campus</a></li>
          </ul>
        </li>
      </ul>
      </div>
    </nav>
  
    <div class="container-lg my-3 ">
      <h1 class="text-center text-white" id="heading">Sarmiento Campus News</h1>
        <div class="container mt-3">
            <div class="row row-cols-3 row-cols-md-3 g-4">
            <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $headline = $row['headline'];
                    $image = $row['file_input'];
                    $description = $row['description'];
                    $datePosted = $row['created_at'];

                    // Output the announcement HTML structure here
                    echo '<div class="col-4">';
                    echo '<div class="card h-100">';
                    echo '<a id="announcementCard" href="VirtualBulsu_AnnouncementPage.php?id='.$announcementId.'">';
                    echo '<img src="uploads/'.$image.'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo "<h5 id='announcementHeadline' class='card-title text-center'>$headline</h5>";
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo "<small class='text-body-secondary'>Date Posted: $datePosted</small>";
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
              } else {
                  echo "<p>No announcements available.</p>";
              }
            ?>
            
        </div>
        </div>
        
    </div>

    


    <footer class="footer">
      <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
    </footer>

    <script>
        document.getElementById("");
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
  </body>
</html>