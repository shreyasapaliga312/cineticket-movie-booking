<?php include_once 'dbfun.php'; ?>
<?php include_once 'dheader.php'; ?>
<div class="container">
    <h2 class="heading">Owner Dashboard</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-2 text-center">
                <a href="theatres.php">
                <div class="card bg-danger">
                    <h4 style="color:white; padding:7px">Theaters</h4>
                    <h4 style="color:white; padding:7px"><?= countrecords("theatre")?></h4>
                </div>
                </a>
            </div>
            <div class="col-sm-3 mb-2 text-center">
                <a href="movies.php">
                <div class="card  bg-warning">
                    <h4 style="color:white; padding:7px">Movies</h4>
                    <h4 style="color:white; padding:7px"><?= countrecords("movie")?></h4>
                </div>
                </a>
            </div>
            <div class="col-sm-3 mb-2 text-center">
                <a href="customers.php">
                <div class="card  bg-success">
                    <h4 style="color:white; padding:7px">Customers</h4>
                    <h4 style="color:white; padding:7px"><?= countrecords("customers")?></h4>
                </div>
                </a>
            </div>
            <div class="col-sm-3 mb-2 text-center" >
                <a href="bookings.php">
                <div class="card  bg-primary">
                    <h4 style="color:white; padding:7px">Bookings</h4>
                    <h4 style="color:white; padding:7px"><?= countrecords("booking") ?></h4>
                </div>
                </a>
            </div>
            <div class="col-sm-3 mb-2 text-center">
                <a href="contact.php">
                <div class="card"style="background-color:purple;">
                    <h4 style="color:white; padding:7px">Message</h4>
                    <h4 style="color:white; padding:7px"><?= countrecords("contact")?></h4>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>