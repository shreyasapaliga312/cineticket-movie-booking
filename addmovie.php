<?php include_once 'dheader.php'; ?>
<?php include_once 'dbfun.php'; ?>
<div class="container">
    <h3 class="text-center heading">Add New Movie</h3>
    <div class="row">
        <div class="col-sm-7">
            <form method="post" enctype="multipart/form-data" action="save_movie.php">
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Movie Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mname" placeholder="Movie Name">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Release Date</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" name="reldate">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Director</label>
                    <div class="col-sm-8">
                        <input type="text"  
                               required class="form-control" name="director" placeholder="Director Name">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Certificate</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="certificate">
                            <option><-- Select Certificate --></option>
                            <option value="A">Adult</option>
                            <option value="UA">Unrestricted Adult</option>
                            <option value="U">Unrestricted</option>
                            <option value="S">Special Class</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Actors</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="actor" placeholder="Actors">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Actress</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="actress" placeholder="Actresses">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Trailer Link</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="trailer" placeholder="Youtube link for trailer">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Photo</label>
                    <div class="col-sm-8">
                        <input type="file" accept=".jpg" required class="form-control-file" name="photo">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Description :</label>
                    <div class="col-sm-8">
                        <textarea name="descr" class="form-control"></textarea>
                    </div>
                </div>
               
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Banner</label>
                    <div class="col-sm-8">
                        <input type="file" accept=".jpg"  class="form-control-file" name="banner">
                    </div>
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-4 col-form-label">Language</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="category">
                            <option><-- Select Language --></option>
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Kannada">Kannada</option>
                        </select>
                    </div>
                
                <input type="submit" class="btn btn-success" value="Add Movie">            
            </form>
        </div>
    </div>
</div>
<?php include_once 'dfooter.php'; ?>