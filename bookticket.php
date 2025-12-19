<?php
include_once 'header.php';
include_once 'dbfun.php';
$mid=$_GET["mid"];
$minfo=single("movie","mid='$mid'");
?>
<h2>Book Movie Ticket</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <img src="<?= $minfo["poster"] ?>" class="img-fluid">
        </div>
        <div class="col-sm-6">
            <form method="post" action="book.php">
                <input type="hidden" name="mid" value="<?= $mid ?>">
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Choose Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="bdate" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Choose Theatre</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="tid">
                            <?php foreach(allrecords("theatre") as $t) { ?>
                            <option value="<?= $t["tid"] ?>"><?= $t["tname"] ?>-<?= $t["location"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Choose Show</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="sid">
                            <?php foreach(allrecords("shows") as $s) { ?>
                            <option value="<?= $s["id"] ?>"><?= $s["showname"] ?>-<?= $s["showtime"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Ticket Price(per head)</label>
                    <div class="col-sm-8">
                        <input type="number" readonly="readonly" required class="form-control" value="100">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Number of Seats</label>
                    <div class="col-sm-8">
                        <input type="number" required class="form-control" name="seats">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Seat Numbers</label>
                    <div class="col-sm-8">
                        <input type="number" required class="form-control" name="seatnums">
                    </div>
                </div>
                
                <input type="submit" value="Book Now" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>

