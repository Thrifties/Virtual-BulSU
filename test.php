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
    <title>Bulacan State University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS\VirtualBulsu_Navbar.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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

      .navbar-custom {
        width: 100%;
        background: none;
        background-color: #763435;
        font-family: "Roboto";
      }
      .navbar-custom .navbar-brand {
        color: aliceblue;
        text-decoration: none;
        font-family: "Roboto";
      }
      .navbar-custom {
                background-color: #763435;
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
        background-color: #763435;
        color: white;
        padding: 5px;
        text-align: center;
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

#collegeLogo {
  width: 100px;
  height: 100px;
  object-fit: contain;
}

.collegeCards {
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: ease-in-out .3s;
}

.card {
  transition: ease-in-out .3s;
}

.card:hover {
  transform: translateY(-5px);
}

.card-img-top {
  background-color: #763435;
  height: 150px;
  object-fit: cover;
  border: solid 2px #763435;
}

.card-title {
  color: #763435;
}

#modalCollegeLogo {
  width: 3em;
  height: 3em;
  object-fit: contain;
  margin-right: 1em;
}

</style>
</head>
<body>
    <?php include "includes/tour_navbar.php"; ?>

    <div class="container-lg my-3">
      <h1 class="text-center text-white" id="heading" >Malolos Campus News</h1>
        <div class="container-lg mt-3">
            <div class="row gx-3">
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
              }
            ?>
        </div>
      </div>
    </div>
    

    <!-- <footer class="footer">
      All rights reserved.
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
  </body>
</html>