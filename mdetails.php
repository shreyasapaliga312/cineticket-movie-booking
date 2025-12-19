<?php include_once 'dbfun.php'; ?>
<?php include_once 'newheader.php'; ?>
<style>
    th,h4,label{
        color:var(--theme-title);
    }
</style>
<div class="container" style="margin-top: 70px;">
    <?php
    $pg = single("movie", "mid='{$_GET["mid"]}'");
    ?>
    <h4 class="text-center p-2 border-bottom border-top mt-2">Displaying Details</h4>
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2">
                <img src="<?= $pg["poster"] ?>" class="card-img-top" style="height:350px;">
                <div class="card-body">
                    <h5><?= $pg["mname"] ?></h5>
                </div>
            </div>            
        </div>
        <div class="col-sm-9">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:200px;">Movie Name</th>
                        <th><?= $pg["mname"] ?></th>
                    </tr>
                    <tr>
                        <th>Director</th>
                        <th><?= $pg["director"] ?></th>
                    </tr>
                    <tr>
                        <th>Actor</th>
                        <th><?= $pg["actor"] ?></th>
                    </tr>
                    <tr>
                        <th>Actress</th>
                        <th><?= $pg["actress"] ?></th>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <th><?= $pg["descr"] ?></th>
                    </tr>
                    <tr>
                        <th>Language</th>
                         <td><?= $pg["category"] ?></td>
                    </tr>

                    <tr>
                        <th>Trailer</th>
                        <th><a href="trailer.php?mid=<?= $pg["mid"] ?>">Show Trailer</a></th>
                    </tr>                    
                </tbody>
            </table>

            <?php
            if (isset($_SESSION["userid"])) {
                ?>
                <div class="row">
                    <div class="col-sm-8">
                        <form method="post" action="seatbook.php">
                            <input type="hidden" name="mid" value="<?= $_GET["mid"] ?>">
                            <div class="form-group form-row">
                                <label class="col-sm-4 col-form-label">Choose Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="bdate" required>
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <label class="col-sm-4 col-form-label">Choose Theatre</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tid">
                                        <?php foreach (allrecords("theatre") as $t) { ?>
                                            <option value="<?= $t["tid"] ?>"><?= $t["tname"] ?>-<?= $t["location"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <label class="col-sm-4 col-form-label">Choose Show</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="sid">
                                        <?php foreach (allrecords("shows") as $s) { ?>
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
                            <input type="submit" class="btn btn-success my-2" value="Book Now"></a>
                        </form>    
                    </div>
                </div>

                <?php
            } else {
                ?>                    
                <h4 class="d-inline-block" style="font-style: italic;color:red;padding:10px;">Please login to book ticket</h4>
                <a href="login.php" class="btn btn-primary btn-sm px-3">Login</a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include_once 'newfooter.php'; ?>