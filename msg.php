<?php
    if(isset($_SESSION["msg"])) {
?>
<div class="alert alert-success text-center font-weight-bold">
    <?= $_SESSION["msg"] ?>
</div>
<?php
        unset($_SESSION["msg"]);
    }
?>
<?php
    if(isset($_SESSION["error"])) {
?>
<div class="alert alert-danger text-center font-weight-bold">
    <?= $_SESSION["error"] ?>
</div>
<?php
        unset($_SESSION["error"]);
    }
?>
