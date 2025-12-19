<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <button type="button" data-target="#add" data-toggle="modal" class="btn btn-sm btn-primary float-right m-2">Add Show</button>
    <h2 class="heading">Shows</h2>
    <?php include_once 'msg.php'; ?>
    <table id="tbl" class="table table-bordered table-sm table-striped">
        <thead class='table-danger'>
            <tr>
                <th style="width:100px">Show ID</th>
                <th>Show Name</th>
                <th>Show Time</th>
                <th>End Time</th>
                <th>Theater Id</th>
                <th>Ticket Price</th>                                  
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (allrecords("shows") as $row) {
                ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["showname"] ?></td>
                    <td><?= $row["showtime"] ?></td>
                    <td><?= $row["endtime"] ?></td>
                    <td><?= $row["tid"] ?></td>
                    <td><?= $row["amount"] ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<!-- add theatre dialog -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="save_show.php">
                <div class="modal-header">
                    <h5>Add Show</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-row">
                        <label class="col-sm-5 col-form-label">Show Name :</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" required name="showname" 
                                   placeholder="Show Name">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-5 col-form-label">Show Time :</label>
                        <div class="col-sm-7">
                            <input type="time" name="showtime" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-5 col-form-label">End Time :</label>
                        <div class="col-sm-7">
                            <input type="time" name="endtime" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-5 col-form-label">Select Theatre :</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-sm" name="tid">
                                <?php foreach(allrecords("theatre") as $row) { ?>
                                <option value="<?= $row["tid"] ?>"><?= $row["tname"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-5 col-form-label">Ticket Price :</label>
                        <div class="col-sm-7">
                            <input type="text" required class="form-control form-control-sm" 
                                   name="amount" value="100" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm float-right" value="Register Show">	
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'dfooter.php'; ?>