<?php include_once 'dbfun.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Movie Ticket Booking System</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <link rel="icon" href="images/pglogo.png">
        <style>
            .header{        
                text-align:center;
                background-size:100% 100%;        
                font-family:Arial;
                color:white;
                margin:0;
                height:300px;
                position: relative;
                background-image: url('images/pgheader2.jpg');
                background-size: 100% 100%;    
            }
            .img-thumbnail{
                width:150px;
            }
            .title{
                position:absolute;top:35%;left:50%;
                transform: translate(-50%,-50%);        
            }
            footer{                                                        
                padding: 5px;	
                position: fixed;
                bottom:0;
                width:100%;
            }
            #cc{
                width:100%;
                height:80vh;
            }            
            .carousel-item{
                height:80vh;
            }
            .carousel-item img{
                height:100%;                
            } 
            @media print{
                #print{
                    display:none;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
            <a class="nav-link navbar-brand" href="index.php">My Show</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="movielist.php">Movies</a>
                    </li>        
                    <?php if (isset($_SESSION["userid"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="bhistory.php">Booking History</a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION["userid"])) { ?>  
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome ! <?= $_SESSION["uname"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>                       
                    <?php } else { ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-link nav-link" href="#" data-toggle="modal" data-target="#login">Login</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-link nav-link" href="#" data-toggle="modal" data-target="#register">Register</button>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        </nav>
