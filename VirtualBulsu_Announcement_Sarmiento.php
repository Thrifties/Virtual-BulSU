<?php 
require "connect.php";

$query = "SELECT college_assignment FROM announcements WHERE campus_assignment = 'Sarmiento Campus' ORDER BY created_at DESC" ;
$result = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bulacan State University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS\VirtualBulsu_Navbar.css" />
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
        width: 100%;
        background-color: #763435;
        color: white;
        padding: 5px;
        text-align: center;
      }

      #announcementCard {
        text-decoration: none; /* Remove underline */
        color: inherit; /* Inherit text color */
      }

      #announcementCard:hover {
        color: inherit; /* Inherit text color on hover */
      }

      .announcementList {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        gap: 1em;
        overflow-x: auto;
      
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
    <?php include "includes/tour_navbar.php"; ?>
  
    <div class="container-lg my-3 ">
      <h1 class="text-center text-white" id="heading">Sarmiento Campus News</h1>
        <div class="container mt-3">
          <div class="row g-3">
            <?php
            if (mysqli_num_rows($result) > 0) {
              $previousCollege = null; // Variable to track the previous college name

              while ($row = mysqli_fetch_assoc($result)) {
                $college = $row['college_assignment'];

                // Check if the current college name is different from the previous one
                if ($college != $previousCollege) {
                  echo '<h2 class="text-white mt-3">' . $college . '</h2>';
                  $previousCollege = $college; // Update the previous college name

                  $query2 = "SELECT * FROM announcements WHERE college_assignment = '" . $college . "' AND campus_assignment = 'Sarmiento Campus' ORDER BY created_at DESC";
                  $result2 = mysqli_query($con, $query2);

                  // Check if there are announcements for this college
                  if (mysqli_num_rows($result2) > 0) {
                    echo '<div class="announcementList">';
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                      $announcementId = $row2['announcement_id'];
                      $headline = $row2['headline'];
                      $image = $row2['file_input'];
                      $description = $row2['description'];
                      $datePosted = date('F d, Y', strtotime($row2['created_at']));

                      // Output the announcement HTML structure here
                      echo '<div class="col-3"">';
                      echo '<div class="card h-100">';
                      echo '<a id="announcementCard" href="VirtualBulsu_AnnouncementPage.php?id=' . $announcementId . '">';
                      echo '<img src="uploads/' . $image . '" class="card-img-top" alt="...">';
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
                    echo '</div>'; // Close the row for announcements
                  }
                }
              }
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