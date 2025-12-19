<!doctype html>
<html lang="en">
    <?php include_once 'dbfun.php'; ?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CineTicket</title>
        <link rel="icon" href="logo.png">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <!-- Template CSS -->
        <link href="//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,600&display=swap"
              rel="stylesheet">
        <!-- Template CSS -->
        <script src="js/jquery-3.5.1.js" type="text/javascript"></script>
        <script>
            $(function () {
                $("#email").blur(function () {
                    $.get("verify.php", {'userid': $(this).val()}, function (output) {
                        if (output.trim() == "no") {
                            $("#err").html("Userid is not available");
                        } else {
                            $("#err").html("");
                        }
                    });
                });
            });
        </script>

    </head>

    <body>

        <!-- header -->
        <header id="site-header" class="w3l-header fixed-top">
            <!--/nav-->
            <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
                <div class="container">
                    <!-- <h1><a class="navbar-brand" href="index.php"><span class="fa fa-play icon-log"
                                                                        aria-hidden="true"></span>
                            Book My Show </a></h1> -->
                    <!-- if logo is image enable this    -->
                                    <a class="navbar-brand" href="#index.html">
                                            <img src="logo.png" alt="Your logo" title="Your logo" style="height:45px;" /><span style="color:#df0e62;">CineTicket</span>
                                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <!-- <span class="navbar-toggler-icon"></span> -->
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="movielist.php">All Movies</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Aboutus.php">Aboutus</a>
                            </li>
                            <?php if (isset($_SESSION["userid"])) { ?> 
                                <li class="nav-item">
                                    <a class="nav-link" href="bhistory.php">My Bookings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Welcome ! <?= $_SESSION["uname"] ?></a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>                                              
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="registration.php">Register</a>                             
                                </li>
                            <?php } ?>
                        </ul>


                    </div>


                </div>
                <!-- toggle switch for light and dark theme -->
                <!-- <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div> -->
                <!-- //toggle switch for light and dark theme -->
                </div>
            </nav>
            <!--//nav-->
        </header>
        <!-- //header -->
