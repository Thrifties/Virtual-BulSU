
<?php
require "connect.php";

$announcementId = $_GET['id'];
$query = "SELECT * FROM announcements WHERE announcement_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $announcementId);  // Assuming announcement_id is an integer, adjust if it's not
$stmt->execute();
$result = $stmt->get_result();

if ($row = mysqli_fetch_assoc($result)) {
    $author = $row['author'];
    $headline = $row['headline'];
    $image = $row['file_input'];
    $description = $row['description'];
    $datePosted = $row['created_at'];
} else {
    echo "Announcement not found";
}

$stmt->close();
mysqli_close($con);
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
    <img src="uploads/<?php $image ?>" id="news-image" class="img-fluid shadow-sm" alt="...">
    <div class="container-lg mt-3">

        <small class="text-body-secondary" id="date-posted">Date posted: <?php $datePosted ?> </small>
        <h1 class="mb-3"><strong><?php $headline ?></strong></h1>

        <small class="text-body-secondary" id="author">Author:  <?php $author ?></small>
        <p class="fs-5"><?php $description ?></p>

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