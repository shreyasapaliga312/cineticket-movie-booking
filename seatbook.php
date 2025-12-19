<?php
echo "<br><br><br><br><br>";
include_once 'dbfun.php';
$rows = ['A', 'B', 'C', 'D', 'E', 'F'];
extract($_POST);
$booked = [];
foreach (findall("booking", "mid='$mid' and bdate='$bdate'") as $r) {
    foreach (preg_split("[,]", $r["seatnums"]) as $s) {
        $booked[] = $s;
    }
}
$mname=single("movie","mid='$mid'")["mname"];
$tname=single("theatre","tid='$tid'")["tname"];
$s=single("shows","id='$sid'");
$sname=$s["showname"]." - ".$s["showtime"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <link href="css/pg.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/css/style-starter.css">
        <title>Movie Seat Booking</title>
        <style>
            body {
                background-color: #242333;
                color: #fff;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                font-family: 'Lato', sans-serif;
                margin: 0;
            }
            input,select{
                box-sizing: border-box;
                padding:8px;
                width:300px;
            }
            label{
                padding:8px;
                display: block;
            }
            input[type='submit']{
                width:120px;
                margin-top:10px;
            }
        </style>
        
    </head>
    <body>
        <header id="site-header" class="w3l-header fixed-top" style="margin-bottom: 20px;">
            <!--/nav-->
            <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
                <div class="container">
                    <!-- <h1><a class="navbar-brand" href="index.html"><span class="fa fa-play icon-log"
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
                <div class="mobile-position">
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
                </div>
                <!-- //toggle switch for light and dark theme -->
                </div>
            </nav>
            <!--//nav-->
        </header>
        
        <h4 class="text-center">Movie : <?= $mid ?></h4>
        
        <ul class="showcase" style="margin-bottom: 20px;">
            <li>
                <div class="seat"></div>
                <small>N/A</small>
            </li>
            <li>
                <div class="seat selected"></div>
                <small>Selected</small>
            </li>
            <li>
                <div class="seat occupied"></div>
                <small>Occupied</small>
            </li>
        </ul>

        <div class="scontainer" style="width:90%;">
            <div class="left" style="width:500px;float:left;">
                <div class="screen"></div>
                <div class="row">

                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <div class="nums"><?= $i == 0 ? "" : $i ?></div>    
                    <?php } ?>

                </div>
                <hr>
                <?php
                for ($i = 0; $i < 6; $i++) {
                    ?>

                    <div class="row">
                        <span style="padding:4px;margin-top:5px;"><?= $rows[$i] ?></span>
                        <?php for ($j = 1; $j <= 8; $j++) { ?>
                            <div id="<?= "{$rows[$i]}$j" ?>" class="seat <?= array_search("$rows[$i]$j", $booked) === false ? "" : "occupied" ?>"></div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>
            <div class="right" style="width:650px;float:right">
                <form name="ff" method="post" action="book.php">
                    <input type="hidden" name="mid" value="<?= $mid ?>">
                    <div class="form-group form-row">
                        <label class="col-sm-4 col-form-label">Booking Date</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" name="bdate" value="<?= $bdate ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4 col-form-label">Theatre Name</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="tid" value="<?= $tid ?>">
                            <input type="text" readonly="readonly" class="form-control" value="<?= $tname ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4 col-form-label">Show Time</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="sid" value="<?= $sid ?>">
                            <input type="text" readonly="readonly" class="form-control" value="<?= $sname ?>">                           
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4 col-form-label">Number of Seats</label>
                        <div class="col-sm-8">
                            <input type="number" readonly="readonly" id='count' required class="form-control" name="seats">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-4 col-form-label">Seat Numbers</label>
                        <div class="col-sm-8">
                            <input type="text" readonly="readonly" id="seatnums" required class="form-control" name="seatnums" required>
                        </div>
                    </div>
                    <br>
                    <input type="submit" value="Book Now" class="btn btn-primary">
                </form>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <button id="btnconfirm" style="margin-left:-350px;">Confirm Now</button>
       
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
