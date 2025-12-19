<?php include_once 'header.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);z-index: 10000">
     <?php include_once 'msg.php'; ?>
</div>
<div class="container-fluid p-0">
    <div id="cc" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#cc" data-slide-to="0" class="active"></li>
            <li data-target="#cc" data-slide-to="1"></li>
            <li data-target="#cc" data-slide-to="2"></li>
            <li data-target="#cc" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slide4.jpg" alt="Third slide">
            </div>
        </div>  
    </div>       
</div>
<div class="container-fluid">
<div class="row"> 
    <?php foreach (allrecords("movie") as $row) { ?>
        <div class="col-sm-3 p-1 text-center">
            <div class="card">
                <img style="height:350px;" class="card-img-top" src="<?= $row["poster"] ?>">
                <div class="card-body bg-success">                                  
                    <h6 style="color:yellow; font-weight:bold;"><?= $row["mname"] ?></h6>                    
                </div>
                <div  class="card-footer">
                    <a class="btn btn-primary btn-sm" href="mdetails.php?mid=<?= $row["mid"] ?>">Book Now</a>        
                </div>
            </div>
        </div>
    <?php } ?>
</div>   
</div>
<?php include_once 'register.php'; ?>
<?php include_once 'footer.php'; ?>
