<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Virtual BulSU - Bulacan State University</title>
  <?php include "includes/cdn.php"; ?>
  <link rel="stylesheet" href="CSS/VirtualBulsu_Navbar.css" />
  <link rel="stylesheet" href="CSS/homepage.css" />
  
  <style>
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class = "navBrand z-3">
    <div class = "container d-flex align-items-center justify-content-center">
      <img src="resources/Virtual BulSU Logo.png" alt="Virtual BulSU Logo" />
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-custom shadow-sm z-2">
    <div class="container d-flex justify-content-center-lg">
      <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-tem">
            <a class="nav-link" id="home-link" href="VirtualBulsu_Tour_HomePage.php">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="campus-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Campus Tour
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
                Campus News
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
    </div>
  </nav>
  <!-- Virtual Tour Introduction -->
  <div id="VTIntroduction">
    <section id="section-tour">
        <!-- Video Background -->
        <video autoplay muted loop id="bg-video">
            <source src="resources/promovid.mp4" type="video/mp4">
            <!-- Add other video formats as needed -->
            Your browser does not support HTML5 video.
        </video>

        <!-- Content Overlaid on Video -->
        <div class="content">
            <h2 class="gold">BULACAN STATE</h2>
            <h2>UNIVERSITY</h2>
            <a href="VirtualBulsu_Tour_Campuses.php" id="btnTour">
                <button class="cta">
                    <span class="hover-underline-animation shadow">START YOUR TOUR</span>
                    <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                        <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                    </svg>
                </button>
            </a>
            <p class="text-white" id="section-tour-subtitle">Embark on a Digital Journey through the Prestigious Campus</p>
        </div>
    </section>
        <p class="lead text-center my-5" id="sub-section-tour"><strong>Navigate through <span class="colored-text">interactive maps</span>, engage with <span class="colored-text">informative hotspots</span>, and envision your <span class="colored-text">academic journey</span> like never before.</strong></p>
    <section class="section-highlights">
        <h1>BULSU HIGHLIGHTS</h1>
        <!-- Slider main container -->
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card text-bg-dark">
                <img src="uploads/bg.png" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                  <p class="card-text"><small>Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
    </section>
    <img src="resources/arrow-down.png" alt="arrow-down" id="arrow-down" />
    <section class="sub-section-2">
      <div class="container">
        <p><small><strong>WELCOME TO <span class="colored-text">BULACAN STATE UNIVERSITY</span></strong></small></p>
        <p class="lead" id="sub-section-description">
          <strong>Your digital gateway to a world of academic excellence, innovation, and community engagement.
            Here, we invite you to explore the comprehensive offerings of our institution, designed to inspire,
            educate, and empower the next generation of leaders. Explore the vibrant student life at
            <span class="colored-text">BulSU</span>, where learning goes beyond the classroom. Learn about student
            organizations, cultural events, sports activities, and community engagement initiatives that contribute to a
            holistic and well-rounded educational experience. Stay up-to-date with the latest news and events at
            <span class="colored-text">BulSU</span>.
          </strong>
        </p>

      </div>
      
    </section>
    
    <section class="section-gallery">
      <h2>DELVE INTO BULACAN STATE UNIVERSITY</h2>
      <div class="news-cards">
        <!-- Include cards displaying recent news articles or upcoming events -->
      </div>
    </section>

    <section class="testimonials">
      <h3>Student Testimonials</h3>
      <div class="testimonial-cards">
        <!-- Include cards with quotes or stories from students or alumni -->
      </div>
    </section>

    <section class="academic-programs">
      <h3>Academic Programs</h3>
      <div class="program-cards">
        <!-- Include cards or sections highlighting different academic programs -->
      </div>
    </section>
    
  </div>
    <footer class="footer">
      <!-- &copy; 2023 Bulacan State University.  -->All rights reserved.
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate__animated", "animate__fadeInUp", "show");
            entry.target.style.opacity = 1;
          } else {
            entry.target.classList.remove("animate__animated", "animate__fadeInUp", "show");
            entry.target.style.opacity = 0;
          }
        });
      });

      observer.observe(document.querySelector("#sub-section-tour"));

const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  spaceBetween: 30,
  slidesPerView: 3,
  centeredSlides: true,
  freeMode:true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});


    </script>
</body>

</html>