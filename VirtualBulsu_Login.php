<?php
require "connect.php";
require "includes/sessionStart.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
</head>
<style>
    html,
    body {
        height: 100%;
    }

    /*start of edit*/
    body {
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),

            url('resources/cover.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        justify-content: center;

    }

    .box-flex-justify-content-center {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }

    .container-justify-content-center {
        width: 400px;
        flex-direction: column;
        padding: 0 15px 0 15px;
        /*border: 2px solid#f7f7f7; */
        border-radius: 10px;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    span {
        color: aliceblue;
        font-family: "Roboto";
        font-size: 15px;
        display: flex;
        justify-content: center;
        padding: 10px 0 10px 0;
    }

    header {
        color: #d09b00;
        font-size: 30px;
        font-family: "Roboto";
        display: flex;
        font-weight: bold;
        justify-content: center;
        padding: 10px 0 10px 0;
    }

    #password, #username {
        height: 45px;
        width: 70%;
        border: none;
        outline: none;
        margin-top: 10px;
        border-radius: 30px;
        color: aliceblue;
        padding: 0 0 0 30px;
        background: rgba(255, 255, 255, 0.1);
        margin-left: 50px;
        display: flex;
    }

    .input-field {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    i {
        position: relative;
        top: -33px;
        left: 20px;
        color: aliceblue;
        justify-content: center;
    }

    ::-webkit-input-placeholder {
        color: aliceblue;
        justify-content: center;
    }

    .submit {
        border: none;
        border-radius: 30px;
        margin-top: 10px;
        font-size: 15px;
        font-family: "Roboto";
        font-weight: 100;
        height: 45px;
        outline: none;
        width: 70%;
        background: rgba(231, 199, 17, 0.7);
        background-color: #fff;
        cursor: pointer;
        transition: 0.3s;
        margin-left: 50px;
    }

    .submit:hover {
        box-shadow: 1px 30px 30px 1px rgba(0, 0, 0, 0.2);
        background: rgba(231, 199, 17, 0.7);
        color: #fff;
    }

    .bottom {
        display: flex;
        font-family: "Roboto";
        flex-direction: row;
        justify-content: space-between;
        font-size: small;
        color: aliceblue;
        margin-top: 10px;
        margin-left: 50px;
    }

    .left {
        display: flex;
    }

    label a {
        color: aliceblue;
        text-decoration: none;
        margin-right: 70px;
    }

    #virtualbulsuLogo {
        width: 180px;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 10px 0 10px 0;
        margin-left: 85px;
    }

    .top-header-d-flex justify-content-center {
        justify-content: center;
    }

    i {
        position: relative;
        top: -30px;
        left: 60px;
        color: #fff;
    }
</style>

<body>
    <div class="box-flex-justify-content-center">
        <div class="container-justify-content-center">
            <div class="top-header-d-flex justify-content-center">

                <img id="virtualbulsuLogo" src="resources\virtualbulsu_logo.png" alt="Logo" />
                <form method="post" action="login.php">
                    <div class="form-group">
                        <div class="input-field">
                            <input type="text" class="form-control" id="username" placeholder="Faculty ID" input name="username" required />
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="form-control" id="password" placeholder="Password" input name="password" required />
                            <i class="bx bx-lock"></i>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Login" />
                        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>