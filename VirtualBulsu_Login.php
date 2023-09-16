<?php 
require "connect.php";
require "includes/sessionStart.php"
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Interface</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>
         html,
            body {
                height: 100%;
            }
            body {
                background: linear-gradient(rgba(51, 50, 50, 0.5), rgba(51, 50, 50, 0.5)),
                    url('resources/BSU_Main.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
    </style>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Login</h3>
                            <form method="post" action="login.php">
                                <div class="form-group">
                                    <label for="username">Admin:</label>
                                    <input name="username" type="text" class="form-control" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input name="password" type="password" class="form-control" id="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include the necessary Bootstrap JavaScript libraries -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>