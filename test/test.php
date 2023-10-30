<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <?php include "../includes/cdn.php" ?>
        <link type="text/css" rel="stylesheet" href="test.css">
    </head>

    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Virtual BulSU</h3>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Admins</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Announcements</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">User Settings</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" id="logoutBtn">Logout</a>
                </li>
            </ul>
        </div>
        <!-- End of Sidebar -->
        <?php include "../includes/js_cdn.php"?>
        <script src="test.js"></script>
    </body>

</html>