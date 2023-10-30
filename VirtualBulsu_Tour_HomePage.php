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
      background:
        /*linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.932)),*/
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

    .cta {
      border: none;
      background: none;
      color: #ffff;
    }

    .cta span {
      padding-bottom: 7px;
      font-family: "Roboto";
      font-weight: bold;
      font-size: 15px;
      padding-right: 15px;
      padding-left: 15px;
      padding-top: 15px;
      padding-bottom: 15px;
      text-transform: uppercase;
      color: darkslategray;
      width: 100%;
      border: none;
      background-color: #ffff;
      border-radius: 30px;

    }

    .cta span:hover {
      background-color: #d09b00;
    }

    .cta svg {
      transform: translateX(-8px);
      transition: all 0.3s ease;
      fill: #ffff;
      margin-left: 20px;
    }

    .cta:hover svg {
      transform: translateX(0);
      fill: #d09b00;
    }

    .cta:active svg {
      transform: scale(0.9);
    }

    .hover-underline-animation {
      position: relative;
      color: aliceblue;
      padding-bottom: 20px;
    }

    .cta:hover .hover-underline-animation:after {
      transform: scaleX(1);
      transform-origin: bottom left;
    }

    .footer {
      /*background: none;*/
      background-color: #763435;
      color: white;
      padding: 5px;
      text-align: center;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 9999;
    }

    h1 {
      font-size: 30px;
      font-family: "Roboto";
      margin-bottom: 2px;
    }

    h2 {
      font-size: 70px;
      font-weight: bold;
      font-family: "Roboto";
      line-height: 60px;
      color: aliceblue;
    }

    p {
      font-size: 15px;
      letter-spacing: 2px;
      margin-bottom: 70px;
    }

    .gold {
      color: #d09b00;
    }

    .navbar-custom .navbar-nav #home-link:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: rgba(255, 215, 0, 1);
      transition: background-color 0.3s ease;
    }

    .navbar-custom .navbar-nav #home-link {
      color: #ffd700;
    }


    @media (max-width: 500px) {
      h1 {
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

  <!-- Virtual Tour Introduction -->
  <div class="container d-block position-absolute mx-5" id="VTIntroduction">
    <div class="image">

    </div>
    <h1>Welcome to</h1>
    <h2 class="gold">BULACAN STATE</h2>
    <h2>UNIVERSITY</h2>
    <p>
      Embark on a Digital Journey through the <br />
      Prestigious Campus
    </p>
    <a href="VirtualBulsu_Tour_Campuses.php" id="btnPrimary">
      <button class="cta">
        <span class="hover-underline-animation">START YOUR TOUR</span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
          <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
        </svg>
      </button>
    </a>
  </div>
  <div class="navigate" <img src="resources\navigate.png" alt="Logo" width="80" height="auto">
    <footer class="footer">
      <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>