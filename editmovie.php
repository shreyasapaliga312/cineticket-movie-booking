<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; 
$mid=$_GET["mid"];
$m=single("movie","mid=$mid");

?>
<div class="container">
    <h3 class="text-center heading">Edit Movie</h3>
    <div class="row">
        <div class="col-sm-7">
            <form method="post" enctype="multipart/form-data" action="update_movie.php">
                <input type="hidden" name="mid" value="<?= $m["mid"] ?>">
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Movie Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mname" value="<?= $m["mname"] ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Release Date</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" value="<?= date('Y-m-d',strtotime($m["reldate"])) ?>" name="reldate">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Director</label>
                    <div class="col-sm-8">
                        <input type="text"  
                               required class="form-control" name="director" value="<?= $m["director"] ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Certificate</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="certificate">
                            <option><-- Select Certificate --></option>
                            <option <?= $m["certificate"]=="A" ? "selected" : "" ?> value="A">Adult</option>
                            <option <?= $m["certificate"]=="UA" ? "selected" : "" ?> value="UA">Unrestricted Adult</option>
                            <option <?= $m["certificate"]=="U" ? "selected" : "" ?> value="U">Unrestricted</option>
                            <option <?= $m["certificate"]=="S" ? "selected" : "" ?> value="S">Special Class</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Actors</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="actor" value="<?= $m["actor"] ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Actress</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="actress"  value="<?= $m["actress"] ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Trailer Link</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="4" name="trailer"><?= htmlspecialchars($m["trailer"]) ?></textarea>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Movie Poster</label>
                    <div class="col-sm-8">
                        <input type="file" accept=".jpg" class="form-control-file" name="poster">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8">
                        <textarea name="descr" class="form-control"><?= $m["descr"]?></textarea>
                    </div>
                   
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Movie Banner</label>
                    <div class="col-sm-8">
                        <input type="file" accept=".jpg" class="form-control-file" name="banner">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Language</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="category">
                            <option><-- Select Language --></option>
                            <option <?= $m["category"]=="English" ? "selected" : "" ?> value="English">English</option>
                            <option <?= $m["category"]=="Hindi" ? "selected" : "" ?> value="Hindi">Hindi</option>
                            <option <?= $m["category"]=="Kannada" ? "selected" : "" ?> value="Kannada">Kannada</option>
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-success" value="Save Movie">
                <!-- <a href="delmovie.php?mid=" class="btn btn-danger">Delete Movie</a> -->
            </form>
        </div>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>