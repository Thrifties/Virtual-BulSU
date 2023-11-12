<?php
require "connect.php";

// Check if the announcement ID is provided in the URL
if (isset($_GET['id'])) {
    $announcementId = $_GET['id'];
    $query = "SELECT * FROM announcements WHERE announcement_id = $announcementId";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Now, you can use $row to display the announcement details
        $headline = $row['headline'];
        $author = $row['author'];
        $image = $row['file_input'];
        $description = $row['description'];
        $datePosted = $row['created_at'];
        $campusAssignment = $row['campus_assignment'];
    } else {
        // Handle the case where the announcement with the provided ID is not found
        $headline = "Announcement Not Found";
        $description = "The announcement you're looking for does not exist.";
        $datePosted = date("Y-m-d H:i:s"); // Current date and time
    }
} else {
    // Handle the case where no announcement ID is provided
    $headline = "Invalid Request";
    $description = "Please provide a valid announcement ID.";
    $datePosted = date("Y-m-d H:i:s"); // Current date and time
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Virtual BulSU - Announcement Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS\VirtualBulsu_Navbar.css" />
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
    <?php include "includes/tour_navbar.php"; ?>
    <img src="uploads/<?php echo $image; ?>" id="news-image" class="img-fluid shadow-sm" alt="...">
    <div class="container-lg mt-3">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="
          <?php if($campusAssignment == "Malolos Campus") {
            echo "VirtualBulsu_Announcement_Malolos.php";
          } elseif($campusAssignment == "Bustos Campus") {
            echo "VirtualBulsu_Announcement_Bustos.php";
          } elseif ($campusAssignment == "Sarmiento Campus") {
            echo "VirtualBulsu_Announcement_Sarmiento.php";
          } elseif ($campusAssignment == "Hagonoy Campus") {
            echo "VirtualBulsu_Announcement_Hagonoy.php";
          } elseif ($campusAssignment == "San Rafael Campus") {
            echo "VirtualBulsu_Announcement_SanRafael.php";
          } elseif ($campusAssignment == "Meneses Campus") {
            echo "VirtualBulsu_Announcement_Meneses.php";
          } else {
            echo "";
          }
          ?>">
            Announcements</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $headline?></li> 
      </ol>
    </nav>

        <small class="text-body-secondary" id="date-posted">Date posted: <?php echo date('F d, Y', strtotime($datePosted)); ?> </small>
        <h1 class="mb-3"><strong><?php echo $headline ?></strong></h1>

        <small class="text-body-secondary" id="author">Author:  <?php echo $author; ?></small>
        <p class="fs-5"><?php echo $description; ?></p>

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
