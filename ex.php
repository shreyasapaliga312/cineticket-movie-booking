<!DOCTYPE html>
<html>
    <head>        
        <title>Movie Ticket Booking System</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="icon" href="images/pglogo.png">
        <link href="css/pg.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
        <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
        <!-- Custom fonts for this template-->
        <link href="css/all.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
</head>
    <nav class="navbar navbar-expand navbar-dark static-top" style="background-color: #920916;">
        <a class="navbar-brand mr-1" href="index.php">Welcome ! Administrator</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

    </nav>
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav" style='background-color: #48040a'>
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="movies.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Movies</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="theatres.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Theaters</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shows.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Shows</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customers.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Customers</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bookings.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Bookings</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dbcontact.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Messages</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="changepwd.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Change Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
        </ul>

        <div id="content-wrapper" 
             style="background:linear-gradient( rgba(255, 255, 255, 0.7) 100%, rgba(255, 255, 255, 0.8)100%),url('images/aa.jpg');width:100vw;height:calc(100vh - 56px);background-size: 100% 100%;">

            <div class="container-fluid">

