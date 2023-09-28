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
      /* background: linear-gradient(
            rgba(51, 50, 50, 0.5),
            rgba(51, 50, 50, 0.5)
          ),
          url("resources/BSU_Main.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        flex-direction: column; */

      background-color: #ececec;
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
      color: white;
      text-decoration: none;
      font-family: "ExtraLight 200", sans-serif;
      /* Remove underline */
    }

    /* Added CSS for image placeholders */
    .image-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
      margin: 2em;
    }

    .container-heading {
      color: #000000;
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      width: 100%;
      font-family: "Roboto";
    }

    .campusSelect {
      display: flex;
      justify-content: center;
    }

    .image-placeholder {
      position: relative;
      width: 300px;
      height: 400px;
      background-color: #76343500;
      margin: 10px;
      transition: filter 0.3s ease-in-out;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 30px;
      overflow: hidden;
      filter: brightness(50%);
    }

    .image-placeholder:hover {
      filter: brightness(100%);
    }

    .image-placeholder img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 30px;
      transition: filter 0.3s ease-in-out;
    }

    .image-container .image-label {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background-color: #763435af;
      color: white;
      font-weight: bold;
      text-align: center;
      opacity: 0;
      transform: translateY(100%);
      transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
      font-family: "Roboto";
    }

    .image-container .image-placeholder:hover .image-label {
      opacity: 1;
      transform: translateY(0);
    }

    .navbar-custom .navbar-nav #campuses-link:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: rgba(255, 215, 0, 1);
      transition: background-color 0.3s ease;
    }

    .navbar-custom .navbar-nav #campuses-link {
      color: #ffd700;
    }

    .footer {
      background-color: #763435;
      color: white;
      padding: 10px;
      text-align: center;
      width: 100%;
      flex-shrink: 0;
    }

    /* Media queries for responsive image placeholders */
    @media (max-width: 768px) {
      .image-placeholder {
        width: 200px;
        height: 400px;
      }
    }

    @media (max-width: 576px) {
      .image-placeholder {
        width: 150px;
        height: 300px;
      }
    }

    /* Added CSS for carousel control arrows */
    .carousel-control-prev,
    .carousel-control-next {
      width: 50px;
      height: 100%;
      background: #76343500;
      color: #5e4141;
      font-size: 30px;
      top: calc(50% - 25px);
      transform: translateY(-50%);
      z-index: 1;
    }

    .carousel-control-prev:focus,
    .carousel-control-next:focus {
      outline: none;
    }

    /* Adjust position of carousel control arrows */
    .carousel-control-prev {
      left: -50px;

    }

    .carousel-control-next {
      right: -50px;
    }

    .navbar-custom .navbar-nav #campus-link:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: rgba(255, 215, 0, 1);
      transition: background-color 0.3s ease;
    }

    .navbar-custom .navbar-nav #campus-link {
      color: #ffd700;
    }
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid d-flex justify-content-start">
      <a class="navbar-brand custom-brand" href="VirtualBulsu_Tour_HomePage.php">
        <img src="resources\virtualbulsu_logo.png" alt="Logo" width="80" height="auto" class="d-inline-block align-top" />
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

  <div class="image-container">
    <div class="container-heading">SELECT CAMPUS</div>
    <div id="image-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_Malolos.php">
                <div class="image-placeholder">
                  <img src="resources/MAINCAMPUS.png" alt="Malolos Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_Meneses.php">
                <div class="image-placeholder">
                  <img src="resources/MENESESCAMPUS.png" alt="Meneses Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_Hagonoy.php">
                <div class="image-placeholder">
                  <img src="resources/HAGONOYCAMPUS.png" alt="Hagonoy Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_Bustos.php">
                <div class="image-placeholder">
                  <img src="resources/BUSTOSCAMPUS.png" alt="Bustos Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_Sarmiento.php">
                <div class="image-placeholder">
                  <img src="resources/SARMIENTOCAMPUS.png" alt="Sarmiento Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
            <div class="col-md-4">
              <a class="campusSelect" href="VirtualBulsu_Tour_SanRafael.php">
                <div class="image-placeholder">
                  <img src="resources/SAN RAFAELCAMPUS.png" alt="San Rafael Campus" />
                  <div class="image-label">START TOUR</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <footer class="footer">
    <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
  </footer>

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>