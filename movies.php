<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<style>
    .form-group{
        padding:2px;    
        margin:0px;
    }
</style>
<a href="addmovie.php" class="btn btn-sm btn-primary float-right m-2">Add New Movie</a>
<div class='clearfix'></div>
<div class="container">
    <?php include_once 'msg.php'; ?>    
    <div class="row">
        <div class="col mx-auto">
            <h3 class="text-center heading">All Movies</h3>
            <table class="table table-bordered table-sm table-striped">
                <thead class='table-danger'>
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Name</th>
                        <th>Release Date</th>
                        <th>Director</th>    
                        <th>Actor</th>
                        <th>Actress</th>
                        <th>Details</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (allrecords("movie") as $row) {
                        ?>
                        <tr>
                            <td><?= $row["mid"] ?></td>
                            <td><?= $row["mname"] ?></td>
                            <td><?= date('d-M-Y', strtotime($row["reldate"])) ?></td>
                            <td><?= $row["director"] ?></td>
                            <td><?= $row["actor"] ?></td>
                            <td><?= $row["actress"] ?></td>
                            <td>
                                <a href="madetails.php?mid=<?= $row["mid"] ?>" class="btn btn-primary btn-sm">Details</a><br><br>
                                <a href="editmovie.php?mid=<?= $row["mid"] ?>" class="btn btn-primary btn-sm" style="background-color:red;">Edit</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- add room dialog -->
<!-- <div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data" action="savepg.php">
                <div class="modal-header">
                    <h5>New PG Buliding Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Owner Name :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" required name="pgname" placeholder="Owner Name">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Type of PG : &emsp; </label>
                        <div class="col-sm-9 text-left">
                            <input type="radio" name="type" value="Boys" id="r1">
                            <label for="r1" class="lbl">Boys</label>
                            <input type="radio" name="type" value="Girls" id="r2">
                            <label for="r2" class="lbl">Girls</label>
                            <input type="radio" name="type" value="Both"id="r3">
                            <label for="r3" class="lbl">Both</label>
                        </div>
                    </div>            
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Address :</label>
                        <div class="col-sm-9">
                            <textarea name="address" rows="2" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Start Date :</label>
                        <div class="col-sm-9">
                            <input type="date" required class="form-control form-control-sm" name="startdate">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Security Details :</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control form-control-sm" 
                                   name="security" placeholder="Security Details">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Rent Start Date :</label>
                        <div class="col-sm-9">
                            <input type="date" required class="form-control form-control-sm" name="rent" placeholder="Rent">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Number of floors :</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control form-control-sm" name="floors" placeholder="No of Floors">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Number of Rooms :</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control form-control-sm" 
                                   name="rooms" placeholder="No of Rooms">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Number of Beds :</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control form-control-sm" 
                                   name="beds" placeholder="No of Beds">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Picture :</label>
                        <div class="col-sm-9">
                            <input type="file" accept=".jpg" required class="form-control-file" name="pic">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Pass Book :</label>
                        <div class="col-sm-9">
                            <input type="file" accept=".jpg" required class="form-control-file" name="passbook">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">User Id :</label>
                        <div class="col-sm-9">
                            <input type="text" required class="form-control" placeholder="Care Taker Userid" name="userid">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Password :</label>
                        <div class="col-sm-9">
                            <input type="password" required placeholder="Care Taker Password" class="form-control" name="pwd">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-sm-3 col-form-label">Confirm Password :</label>
                        <div class="col-sm-9">
                            <input type="password" required placeholder="Confirm Password" class="form-control" name="cpwd">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <hr style="border-width:5px">
                            <h5 style="color:red; font-weight:bold; font-style:italic;">Facilities :</h5>
                            <div class="form-group">
                                <label>Fully Furnished :&emsp; </label>
                                <input type="radio" id="r6" name="furnished" value="Yes">
                                <label for="r6" class="lbl">Yes</label>
                                <input type="radio" name="furnished" value="No" id="r7">
                                <label for="r7" class="lbl">No</label> 
                            </div>
                            <div class="form-group">
                                <label>Parking :&emsp; &emsp; &emsp; &ensp;</label>
                                <input type="radio" name="parking" value="Yes" id="r8">
                                <label for="r8" class="lbl">Yes</label>
                                <input type="radio" name="parking" value="No" id="r9">
                                <label for="r9" class="lbl">No</label>
                            </div>
                            <div class="form-group">
                                <label>AC :&emsp; &emsp; &emsp; &emsp; &emsp; </label>
                                <input type="radio" name="ac" value="Yes" id="r10">
                                <label for="r10" class="lbl">Yes</label>
                                <input type="radio" name="ac" value="No" id="r11">
                                <label for="r11" class="lbl">No</label>
                            </div>
                            <div class="form-group">
                                <label>WiFi:&emsp; &emsp; &emsp; &emsp; &emsp; </label>
                                <input type="radio" name="wifi" value="Yes" id="r14">
                                <label for="r14" class="lbl">Yes</label>
                                <input type="radio" name="wifi" value="No" id="r15">
                                <label for="r15" class="lbl">No</label>
                            </div>
                            <div class="form-group">
                                <label>Security :&emsp; &emsp; &emsp; &ensp; </label>
                                <input type="radio" name="security" value="Yes" id="r16">
                                <label for="r16" class="lbl">Yes</label>
                                <input type="radio" name="security" value="No" id="r17">
                                <label for="r17" class="lbl">No</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <hr style="border-width:5px"><h5 style="color:red; font-weight:bold; font-style:italic;">Meals :</h5>

                            <div class="form-group">
                                <label>Breakfast :&emsp; &emsp; &ensp; </label>
                                <input type="radio" name="breakfast" value="Yes" id="r18">
                                <label for="r18" class="lbl">Yes</label>
                                <input type="radio" name="breakfast" value="No" id="r19">
                                <label for="r19" class="lbl">No</label>
                            </div>
                            <div class="form-group">
                                <label>Lunch :&emsp; &emsp; &emsp; &ensp; </label>
                                <input type="radio" name="lunch" value="Yes" id="r20">
                                <label for="r20" class="lbl">Yes</label>
                                <input type="radio" name="lunch" value="No" id="r21">
                                <label for="r21" class="lbl">No</label>
                            </div>
                            <div class="form-group">
                                <label>Dinner :&emsp; &emsp; &emsp; &ensp; </label>
                                <input type="radio" name="dinner" value="Yes" id="r22">
                                <label for="r22" class="lbl">Yes</label>
                                <input type="radio" name="dinner" value="No" id="r23">
                                <label for="r23" class="lbl">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-sm float-right" value="Register PG Building">	
                </div>
            </form>
        </div>
    </div>
</div> -->
<?php include_once 'dfooter.php'; ?>