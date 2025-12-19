<?php
include_once 'dbfun.php';
include_once 'dheader.php';
$mid=$_GET["mid"];
$m=single("movie","mid=$mid");

?>
<div class="container">
    <h4 class="text-center p-2">Trailer of movie <?= $m["mname"] ?></h4>
    <?= $m["trailer"] ?>
</div>
<?php include_once 'dfooter.php';?>

