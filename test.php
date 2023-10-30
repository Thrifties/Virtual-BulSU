<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      .sidebar {
        width: 280px;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        background-color: #763435;
      }

      #logo {
        width: 130px;
        height: auto;
        margin: 0 auto;
      }

      .nav-link {
        color: #fff;
        text-decoration: none;
      }

      .main-items:hover {
        color: #fff;
        text-decoration: none;
        background-color: #6E2E20;
      }

      .nav-link.active {
        color: #fff;
        text-decoration: none;
      }

      #userDropdown {
        color: #fff;
        text-decoration: none;
      }

      #active-page {
        color: #ffd700;
        text-decoration: none;
        background-color: #4C1D14;
      }

      .icons {
        margin-right: 1rem;
      }

      .dropdown ul li a {
        color: #763435;
        text-decoration: none;
      }

      .dropdown ul li a:hover {
        color: #763435;
        text-decoration: none;
      }

    </style>
  </head>
  <body>
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
    <img src="resources/virtualbulsu_logo.png" id="logo" alt="Virtual BulSU Logo">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link main-items d-flex align-items-center" id="active-page" aria-current="page">
          <box-icon name='notepad' color='#ffd700' class="icons" ></box-icon>
          Announcements
        </a>
      </li>
      <li>
        <a href="#" class="nav-link main-items d-flex align-items-center">
          <box-icon name='user-check' color="#fff" class="icons"></box-icon>
          Admins
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="nav-link d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <box-icon name='user-circle' color='#fff' class="icons"></box-icon>
        <strong>User</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item d-flex align-items-center" href="#">
          <box-icon name='user' color="#763435" class="icons"></box-icon>User Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item d-flex align-items-center" href="#"><box-icon name='log-out' color="#763435" class="icons"></box-icon>Sign out</a></li>
      </ul>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>