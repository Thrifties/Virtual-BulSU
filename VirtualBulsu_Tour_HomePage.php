<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bulacan State University</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/VirtualBulsu_Navbar.css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      background:
        linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)),
        url("resources/school_cover8.png");
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
      font-family: "Roboto";
      font-weight: bold;
      font-size: 15px;
      padding-right: 15px;
      padding-left: 15px;
      padding-top: 15px;
      padding-bottom: 15px;
      text-transform: uppercase;
      color: #d09b00;
      width: 100%;
      border: none;
      background-color: #ffff;
      border-radius: 5px;

    }

    .cta span:hover {
      background-color: #d09b00;
      color: white;
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
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      width: 100%;
    }

    h1 {
      font-size: 2rem;
      font-family: "Roboto";
      margin-bottom: 2px;
      letter-spacing: 3px;
    }

    h2 {
      font-size: 5rem;
      font-weight: bolder;
      line-height: 60px;
      color: white;
      letter-spacing: 5px;
      font-family: Georgia, sans-serif;
    }

    p {
      font-family: "Roboto";
      font-size: 1rem;
      letter-spacing: 2px;
      margin-bottom: 40px;
    }

    .gold {
      color: white;
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


    @media (max-width: 576px) {
      h1 {
        font-size: 1.5rem;
      }

        h2 {
            font-size: 2.5rem;
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
  <div class="container my-auto mx-lg-5" id="VTIntroduction">
    <div class="image">

    </div>
    <h1>Welcome to</h1>
    <h2 class="gold">BULACAN STATE</h2>
    <h2>UNIVERSITY</h2>
    <p>
      Embark on a Digital Journey through the Prestigious Campus.<br />
      Navigate through interactive maps, engage with informative hotspots, <br />
      and envision your academic journey like never before.
    </p>
    <a href="VirtualBulsu_Tour_Campuses.php"  id="btnPrimary">
      <button class="cta">
        <span class="hover-underline-animation shadow">START YOUR TOUR</span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
          <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
        </svg>
      </button>
    </a>
  </div>
    <footer class="footer">
      <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>