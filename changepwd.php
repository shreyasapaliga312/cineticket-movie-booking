<?php include_once 'dbfun.php'; 
if($_SESSION["role"]=="admin"){
    include_once 'dheader.php'; 
}
else{
include_once 'theader.php';     
}
?>
<div class="container">
    <h2 class="text-center p-2">Change Password</h2>
    <div class="row">
        <div class="col-sm-5 mx-auto">
            <?php include 'msg.php';?>
            <form method="post" action="changepass.php">                
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" required class="form-control" name="pwd" placeholder="Current Password">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" required class="form-control" name="npwd" placeholder="New Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" required class="form-control" name="cpwd" placeholder="Confirm Password">
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Change Password">
            </form>
        </div>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>