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

            url('resources/school_cover15.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        justify-content: center;

    }
    .container {
        width: 50vw;
        height: 60vh;
        display: grid;
        grid-template-columns: 100%;
        grid-template-areas: "login";
        box-shadow: 0 0 17px 10px rgb(0 0 0 / 30%);
        border-radius: 20px;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
            url('resources/school_cover14.png');
        overflow: hidden;
        background-size: cover;
    }

    .rotate-45 {
        transform: rotate(-45deg);
    }

    .login {
        grid-area: login;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .login h3.title {
        margin-top: 30px;
        margin-bottom: 30px;
        font-family: 'Roboto';
        font-size: 30px;
        font-weight: bold;
        padding-top: 50px;
        color: #2c1414;
    }

    .text-input {
        background: #e6e6e6;
        height: 40px;
        display: flex;
        width: 60%;
        align-items: center;
        border-radius: 10px;
        padding: 0 15px;
        margin: 5px 0;
    }

    .text-input input {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        height: 100%;
        margin-left: 10px;
        color: #2c1414;
    }

    .text-input i {
        color: #686868;
    }

    ::placeholder {
        color: #9a9a9a;
    }

    .login-btn {
        width: 68%;
        padding: 10px;
        color: white;
        background: linear-gradient(to right, #ff966d, #fa538d, #89379c);
        border: none;
        border-radius: 20px;
        cursor: pointer;
        margin-top: 10px;
        background: rgba(231, 199, 17, 0.7);
        background-color: #fff;
        cursor: pointer;
        transition: 0.3s;
    }

    a {
        font-size: 12px;
        color: #9a9a9a;
        cursor: pointer;
        user-select: none;
        text-decoration: none;
    }

    @media (min-width: 768px) {
        .container {
            grid-template-columns: 50% 50%;
            grid-template-areas: "design login";
        }

        .design {
            display: block;
        }
    }

    .input-field .submit {
        color: #fff;
        margin-top: 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
        height: 40px;
        width: 200px;
        background-color: #8D4242;
        border: white;

    }

    .input-field .submit:hover {
        color: white;
        background-color: #2c1414;
    }
</style>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <form method="post" action="login.php">
            <div class="form-group">
                <div class="login">
                    <h3 class="title">Welcome</h3>
                    <div class="text-input">
                        <i class="ri-user-fill"></i>
                        <input type="text" placeholder="Faculty ID" input name="username" required />
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="text-input">
                        <i class="ri-lock-fill"></i>
                        <input type="password" placeholder="Password" input name="password" required />
                        <i class="bx bx-lock"></i>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" value="LOGIN" />
                    </div>
                </div>
            </div>
           
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>