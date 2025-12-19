<?php
include_once 'dbfun.php';
include_once 'newheader.php';
$mid=$_GET["mid"];
$m=single("movie","mid=$mid");
?>
<div class="jumbotron bg-dark text-white text-center" style="margin-top: 80px;">
    <h4>Trailer of movie <?= $m["mname"] ?></h4>
</div>
<div class="container my-2">
    <?= $m["trailer"] ?>
</div>
<?php include_once 'newfooter.php';?>

