<?php 
require "connect.php";

$query = "SELECT DISTINCT college_assignment FROM announcements WHERE campus_assignment = 'Malolos Campus' ORDER BY college_assignment DESC" ;
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Virtual BulSU - Malolos Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS\VirtualBulsu_Navbar.css" />
    <link rel="stylesheet" href="CSS\announcement_style.css" />
    <link rel="icon" href="resources/Virtual BulSU Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <style>
      .navbar-custom, .footer {
        background-color: #763435;
      }
    </style>
  </head>
  <body>
    <?php include "includes/tour_navbar.php"; ?>

    <div class="container-lg my-3">
      <h1 class="text-center text-white" id="heading" >Malolos Campus News</h1>
      <div class="container-lg mt-3">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-2 overflow-auto">
            <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

        
                  //echo '<h2 class="text-white">'.$row['college_assignment'].'</h2>';
                  $college = $row['college_assignment'];

                  $query2 = "SELECT * FROM announcements WHERE college_assignment = '$college' AND campus_assignment = 'Malolos Campus' ORDER BY created_at DESC";
                  $result2 = mysqli_query($con, $query2);


                  //trim the spaces in the string
                  $collegeId = str_replace(' ', '', $college);

                    echo '
                    <div class="col">
                      <div type="button" class="card h-100 p-1 shadow collegeCards" data-bs-toggle="modal" data-bs-target="#'.$collegeId.'">
                        <img src="resources/college-banners/'.$college.'.png" class="card-img-top rounded" alt="...">
                        <div class="card-body">
                          <img src="resources/college-logo/'.$college.'.png" alt="" class="position-absolute top-50 start-50 translate-middle" id="collegeLogo">
                          <h5 class="card-title text-center mt-5"> '.$college.'</h5>
                        </div>
                      </div>
                    </div>
                      ';

                    echo '
                    <div class="modal fade" id="'.$collegeId.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <img src="resources/college-logo/'.$college.'.png" alt="" id="modalCollegeLogo">
                            <h5 class="modal-title">'.$college.'</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class = "row row-cols-1 row-cols-md-3 row-cols-lg-4 g-2">
                          ';?>

                          <?php 
                            if (mysqli_num_rows($result2) > 0) { 
                              while ($row2 = mysqli_fetch_assoc($result2)) { 
                                echo '
                                <div class="col">
                                  <a href="VirtualBulsu_AnnouncementPage.php?id='.$row2['announcement_id'].'" class="text-decoration-none">
                                    <div class="card h-100">
                                      <img src="uploads/'.$row2['file_input'].'" class="card-img-top" alt="...">
                                      <div class="card-body">
                                        <h5 class="card-title">'.$row2['headline'].'</h5>
                                      </div>
                                      <div class="card-footer">
                                        <small class="text-body-secondary">Date Posted: '.date('F d, Y', strtotime($row2['created_at'])).'</small>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                                ';
                              }
                            }
                          ?>

                          <?php
                          echo'
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    ';
                }
              } else {
                echo '<h2 class="text-white text-center">No announcements yet</h2>';
              }
            ?>
        </div>
      </div>
    </div>
    

    <?php include "includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
  </body>
</html>