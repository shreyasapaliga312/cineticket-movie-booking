<?php include_once 'dbfun.php'; ?>
<?php include_once 'dheader.php'; ?>
<div class="container">
    <?php
    $pg = single("movie", "mid='{$_GET["mid"]}'");
    ?>
    <h4 class="text-center p-2 border-bottom border-top mt-2">Displaying Details</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="card mb-2">
                <img src="<?= $pg["poster"] ?>" class="card-img-top" style="height:350px;">
                <div class="card-body">
                    <h5><?= $pg["mname"] ?></h5>
                </div>
            </div>            
        </div>
        <div class="col-sm-8">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Movie Name</th>
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
                        <th>Language</th>
                        <th><?= $pg["category"] ?></th>
                    </tr>
                    <tr>
                        <th>Trailer</th>
                        <th><a href="atrailer.php?mid=<?= $pg["mid"] ?>">Show Trailer</a></th>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>