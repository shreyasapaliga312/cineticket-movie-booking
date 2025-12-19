<?php include_once 'newheader.php'; ?>
<div class="jumbotron bg-dark text-white rounded-0" style="margin-top: 70px;">
    <h2 class="heading">All Movies List</h2>
</div>

<div class="searchResults">
    <h1>Search result for<?php echo $_GET['search']?></h1>
    <div class="result">

    </div>
</div>
<div class="container-fluid">
<div class="row"> 
    <?php foreach (allrecords("movie") as $row) { ?>
        <div class="col-sm-3 p-1 text-center">
            <div class="card m-2">
                <img style="height:350px;" class="card-img-top" src="<?= $row["poster"] ?>">
                <div class="card-body ">                                  
                    <h6 style="color:black; font-weight:bold;"><?= $row["mname"] ?></h6>                    
                </div>
                <div  class="card-footer">
                    <a class="btn btn-primary btn-sm" href="mdetails.php?mid=<?= $row["mid"] ?>">View Details</a>        
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>
<?php include_once 'register.php'; ?>
<?php include_once 'newfooter.php'; ?>

<!-- bg-success -->