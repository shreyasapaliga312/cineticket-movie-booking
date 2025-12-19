<!-- register dialog -->
<div class="modal" id="success" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1">                
                <h4 class="modal-title">Success</h4>
                <button class="close" type="button" data-target="modal" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">                
            </div>
        </div>
    </div>
</div>
     
<!-- register dialog -->
<div class="modal" id="register" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="reg" action="save.php">
            <div class="modal-header">
                <h5 class="modal-title">Register Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="uname" placeholder="Your Name">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">E-Mail</label>
                    <div class="col-sm-8">
                        <input id="email" type="email" required class="form-control" name="email" placeholder="E-Mail">
                        <span id="err" class="text-danger"></span>
                    </div>
                    
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Phone Number</label>
                    <div class="col-sm-8">
                        <input type="text"  maxlength="10" pattern="[0-9]{10}" 
                               required class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender">
                            <option><-- Select Gender --></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-block" value="Register Now">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- login dialog -->
<div class="modal" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="log" action="validate.php">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email Id</label>
                    <input type="text" required class="form-control" name="userid" placeholder="Email ID">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" required class="form-control" name="pwd" placeholder="Password">
                </div>
            </div>                
            <div class="modal-footer">
                <input type="submit" class="btn btn-success btn-block" value="Login">
            </div>
            
            </form>
        </div>
    </div>
</div>