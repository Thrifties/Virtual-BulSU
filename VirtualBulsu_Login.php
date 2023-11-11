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

    /*
    old code for the login ui

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
        /*border: 2px solid#f7f7f7; 
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

    .input-flex-justify-content-center {
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
    }  */

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
    <!--<div class="box-flex-justify-content-center">
        <div class="container-justify-content-center">
            <div class="top-header-d-flex justify-content-center">
                <span>Have an account? </span> -->
    <!--<header>Login Form</header>
                <img id="virtualbulsuLogo" src="resources\virtualbulsu_logo.png" alt="Logo" /> -->
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
            <!--
                        <div class="input-field">
                            <input type="number" placeholder="Faculty ID" input name="username" required />
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" placeholder="Password" input name="password" required />
                            <i class="bx bx-lock"></i>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Login" />
                        </div>
-->

            <!--<div class="bottom">
                            <div class="left">
                                <input type="checkbox" id=" check" />
                                <label for="check"> &nbsp Remember Me </label>
                            </div>
                            <div class="right">
                                <label><a href="#"> Forgot Password?</a></label>
                            </div> 

                          
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
            >>>>>>> cccaa5ffbe21c7005caa4528017ee2457e459ad7:VirtualBulsu_Login.php
        </div>
        <div class="right">
            <label><a href="#"> Forgot Password?</a></label>
        </div>
    </div>
    </div>
    </div>
    </div>
    
     Include the necessary Bootstrap JavaScript libraries -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>