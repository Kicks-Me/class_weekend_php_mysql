<?php
    session_start();
    
    if(isset($_SESSION["Username"]) && isset($_SESSION["Role"]))
    {
        header("location: index.php");
        exit();
    }

$color = "";
$msg = "";

    if(isset($_GET["type"]) && isset($_GET["err"]))
    {
        if($_GET["type"] == "E")
        {
            $color = "red";
        }
        elseif($_GET["type"] == "O")
        {
            $color = "green";
        }
        else
        {
            $color = "gold";
        }

        if($_GET["err"] == "empty")
        {
            $msg = "Username or password is empty";
        }
        elseif($_GET["err"] == "sqlerr")
        {
            $msg = "Error connecting to db";
        }
        elseif($_GET["err"] == "nouser")
        {
            $msg = "Not found username";
        }
        elseif($_GET["err"] == "pass")
        {
            $msg = "Login success";
            header("refresh:1, index.php");
        }
    }
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login Form</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);

        body {
            background: #f5f5f5;
        }

        @media only screen and (max-width: 767px) {
            .hide-on-mobile {
                display: none;
            }
        }

        .login-box {
            background: url(https://i.imgur.com/73BxBuI.png);
            background-size: cover;
            background-position: center;
            padding: 50px;
            margin: 50px auto;
            min-height: calc(100vh - 7rem);
            -webkit-box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 60px -5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-family: "Script MT";
            font-size: 54px;
            text-align: center;
            color: #888888;
            margin-bottom: 1rem;
        }

        .logo .logo-font {
            color: #3BC3FF;
        }

        @media only screen and (max-width: 767px) {
            .logo {
                font-size: 34px;
            }
        }

        .header-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }

        .login-form .form-control {
            border-radius: 0;
            margin-bottom: 30px;
        }

        .login-form .form-group {
            position: relative;
        }

        .login-form .form-group .forgot-password {
            position: absolute;
            top: 8px;
            right: 15px;
        }

        .forgot-password{
            opacity: 0.7;
        }

        .forgot-password:hover {
            cursor: pointer;
            opacity: 1;
        }

        .login-form .btn {
            border-radius: 0;
            -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .login-form .btn.btn-primary {
            background: #3BC3FF;
            border-color: #31c0ff;
        }

        .slider-feature-card {
            /* background: #fff; */
            background: inherit;
            color: #fff;
            max-width: 280px;
            margin: 0 auto;
            padding: 30px;
            text-align: center;
            -webkit-box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 25px -3px rgba(2, 5, 5, 0.1);
        }

        .slider-feature-card img {
            height: 80px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .slider-feature-card h3,
        .slider-feature-card p {
            margin-bottom: 30px;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li {
            cursor: pointer;
        }
    </style>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <section class="body">
        <div class="container">
            <div class="login-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <span class="logo-font">Kicks</span>Me Class
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h3 class="header-title">LOGIN</h3>
                        <form class="login-form" method="post" action="./controllers/login.control.php">
                            <div class="form-group">
                                <input type="text" id="txtUsername" name="txtUsername" class="form-control" placeholder="Email or UserName">
                            </div>
                            <div class="form-group">
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password">
                                <p class="forgot-password" onclick="return pwdToggle()">
                                    <i id="pwd" class='far fa-eye'></i>
                                    <!-- <i class='far fa-eye'></i> -->
                                </p>
                            </div>
                            <div style="color:<?php echo $color; ?>; margin-bottom: .8rem;">
                                <?php echo $msg; ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="Submit" name="Submit" class="btn btn-primary btn-block" value="LOGIN" />
                            </div>
                            <div class="form-group">
                                <div class="text-center">ຂ້າພະເຈົ້າ, ແມ່ນສະມາຊິກໃໝ່? <a style="font-weight: 800;" href="./register.php">ລົງທະບຽນ</a></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 hide-on-mobile">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="slider-feature-card">
                                        <img src="https://i.imgur.com/YMn8Xo1.png" alt="">
                                        <h3 class="slider-title">Title Here</h3>
                                        <p class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, odio!</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="slider-feature-card">
                                        <img src="https://i.imgur.com/Yi5KXKM.png" alt="">
                                        <h3 class="slider-title">Title Here</h3>
                                        <p class="slider-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, debitis?</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/app.js"></script>
   <script src="https://kit.fontawesome.com/43d3f0499e.js" crossorigin="anonymous"></script>

</body>

</html>