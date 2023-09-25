<?php 
require "connect.php";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bulacan State University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes\VirtualBulsu_Navbar.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <style>
      html,
      body {
        height: 100%;
      }

      body {
        background-color: white;
        display: flex;
        flex-direction: column;
      }

      .navbar-custom {
        z-index: 9999;
        width: 100%;
        background: none;
        background-color: #763435;
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

      .footer {
        /*background: none;*/
        margin-top: 5rem; 
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

    #date-posted, #author {
        color:#763435 !important;
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
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">Bustos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">Hagonoy Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">Malolos Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">San Rafael Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">Sarmiento Campus</a></li>
            <li><a class="dropdown-item" href="VirtualBulsu_Tour_Announcement.php">Meneses Campus</a></li>
          </ul>
        </li>
      </ul>
      </div>
    </nav>
    <img src="resources/BSU_Main.jpg" id="news-image" class="img-fluid shadow-sm" alt="...">
    <div class="container-lg mt-3">

        <small class="text-body-secondary" id="date-posted">Date today: October 15, 2023</small>
        <h1 class="mb-3"><strong>Robot Dogs Take Over the Red Planet: Mars Mission Success!</strong></h1>

        <small class="text-body-secondary" id="author">Author:  John R. Marsfield</small>
        <p class="fs-5"> In a historic leap for mankind, the Mars Exploration Team has achieved a groundbreaking milestone by deploying a fleet of robotic dogs on the surface of the Red Planet. These highly advanced quadrupeds, designed by TerraTech Industries, have successfully landed on Mars and begun their mission to explore and collect valuable data about the Martian environment.

        Equipped with cutting-edge sensors, cameras, and AI systems, these robot dogs will traverse the Martian terrain, examining the geology, climate, and atmosphere of the planet. They will also search for signs of past or present microbial life and study the feasibility of human colonization.

        The project, dubbed "Paws on Mars," marks a significant step toward realizing the dream of human exploration and potential settlement on Mars. The robot dogs are capable of navigating rugged terrain, extreme temperatures, and low-pressure environments, making them ideal for this ambitious mission.

        Scientists and engineers at NASA and TerraTech Industries have been working tirelessly for years to develop and prepare these robotic explorers for their journey. The successful landing and deployment of the robot dogs have sparked excitement and hope within the global space community.

        As the robot dogs roam the Martian surface, they will send back real-time data and stunning images, allowing scientists and space enthusiasts to witness the mysteries of Mars up close. The information gathered by these mechanical pioneers will be invaluable for future manned missions to the Red Planet.

        Stay tuned for more updates on this extraordinary mission as "Paws on Mars" paves the way for humanity's next giant leap into the cosmos.</p>

    </div>


    <footer class="footer">
      <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
    </footer>

    <script>
        document.getElementById("");
    </script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>