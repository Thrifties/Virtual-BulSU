<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bulacan State University</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="CSS/VirtualBulsu_Navbar.css" />
  <link rel="icon" href="resources/virtualbulsu_logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/carousel.css">
</head>

<body>
  
<?php include "includes/tour_navbar.php"; ?>


  <div id="campusSelect">
    <h1>Select Campus</h1>
    <div class="swiper tranding-slider slider-faded" id="slider">
      <div class="swiper-wrapper">


        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_Malolos.php"><img src="resources/campus_main.png" alt="Tranding"></a>
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>


        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_Hagonoy.php"><img src="resources/campus_hagonoy.png" alt="Tranding"></a>
            <div class="centered">HAGONOY CAMPUS</div>
            <div class="address"> Iba-Carillo, Hagonoy Bulacan – 3002, Philippines </div>
            <div class="bottom-centered"> Bulacan State University's plan of establishing a satellite campus in the Municipality of Hagonoy was drafted way back 1995 when an 8-hectare land was donated to BulSU during the said year. Hagonoy Campus aspires to be recognized as an institution of global competence and with great respect and regard to the environment.</div>
          </div>
        </div>

        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_Sarmiento.php"><img src="resources/campus_sarmiento.png" alt="Tranding"></a>
            <div class="centered">SARMIENTO CAMPUS</div>
            <div class="address"> University Heights, Brgy. Kaypian, City of San Jose del Monte Bulacan, 3023, Philippines </div>
            <div class="bottom-centered"> "Great things starts from small begginings." In 1998, Cong. Angelito M. Sarmiento donated a 2-hectare lot to the Bulacan State University that shall serve as an extension campus of the University. Established in 1998, the Sarmiento Campus started as the BSU San Jose Del Monte Campus offering Engineering courses.</div>
          </div>
        </div>

        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_SanRafael.php"><img src="resources/campus_sanrafael.png" alt="Tranding"></a>
            <div class="centered">SAN RAFAEL CAMPUS</div>
            <div class="address"> Plaridel Bypass Rd, San Rafael, Bulacan, Philippines </div>
            <div class="bottom-centered"> Republic Act No. 11329, which lapsed into law last April 22, 2019, enables the establishment of a Bulacan State University campus in the Municipality of San Rafael, Province of Bulacan. Thus will be known as the Bulacan State University-San Rafael Campus. </div>
          </div>
        </div>

        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_Bustos.php"><img src="resources/campus_bustos.png" alt="Tranding"></a>
            <div class="centered">BUSTOS CAMPUS</div>
            <div class="address"> L. Mercado St. Corner C.L. Hilario St. Bustos, Bulacan – 3007, Philippines </div>
            <div class="bottom-centered"> The Bulacan State University-Bustos (BulSU Bustos) is the biggest satellite campuses in the university. From sharing a roof with the Bustos Elementary School, the school grew into an institution of learning that provides quality technical-vocational courses to the citizens of Bustos and its neighboring areas. </div>
          </div>
        </div>

        <div class="swiper-slide tranding-slide">
          <div class="tranding-slide-img">
            <a href="VirtualBulsu_Tour_Meneses.php"><img src="resources/campus_meneses.png" alt="Tranding"></a>
            <div class="centered">MENESES CAMPUS</div>
            <div class="address"> L. Mercado St. Corner C.L. Hilario St. Bustos, Bulacan – 3007, Philippines </div>
            <div class="bottom-centered"> The Bulacan State University came into being as an intermediate school known as Bulacan Trade School, founded in 1904 by virtue of Legislative Act passed by the Philippine Commission in 1901. It initially offered specialization in woodworking furniture, and cabinet making. </div>
          </div>
        </div>

      </div>
      <div class="tranding-slider-control">
        <div class="swiper-button-prev slider-arrow">
          <ion-icon name="arrow-back-outline"></ion-icon>
        </div>
        <div class="swiper-button-next slider-arrow">
          <ion-icon name="arrow-forward-outline"></ion-icon>
        </div>
        <div class="swiper-pagination"></div>
      </div>


    </div>

  </div>

  <!--
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
-->




  <footer class="footer">
    <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
  </footer>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/carousel.js"></script>
  </body>
</html>
