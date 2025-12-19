<?php
include_once 'dbfun.php';
include_once 'dheader.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7">
            <h4 class="heading">Theatres</h4>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Theatre Id</th>
                        <th>Theatre Name</th>
                        <th>Theatre Location</th>
                        <th>Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (allrecords("theatre") as $r) { ?>
                        <tr>
                            <td><?= $r["tid"] ?></td>
                            <td><?= $r["tname"] ?></td>
                            <td><?= $r["location"] ?></td>
                            <td><?= $r["seats"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>        
        </div>
        <div class="col-sm-5">
            <h4>Add New Theatre</h4>
            <form method="post" action="save_theatre.php">
                <div class="form-group">
                    <label>Theatre Name</label>
                    <input type="text" name="tname" class="form-control">
                </div>
                <div class="form-group">
                    <label>Theatre Location</label>
                    <input type="text" name="location" class="form-control">
                </div>
                <div class="form-group">
                    <label>Theatre Capacity</label>
                    <input type="text" name="seats" class="form-control" value="60" disabled>
                </div>
                <input type="submit" value="Save Theatre" class="btn btn-primary">
            </form>
        </div>
    </div>

</div>

<?php
include_once 'dfooter.php';
?>
