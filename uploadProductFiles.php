<?php
include_once "includes/header.inc.php";
?>

<div class="col-lg-12 col-md-12">
    <div class="register-form">
    <form action="includes/uploadFiles.inc.php" method="post" enctype="multipart/form-data">
    <div class="form-group" style="margin-left: 200px;">
          <label class="form-control-label">Upload photos</label>
              <input type="file" class="file-move" name="image[]" multiple>
          </div>
          <div class="form-group" style="margin-left: 200px;">
            <input type="button" class="btn btn-danger" value="Cancel">
            <input type="submit" name="submitPhotos" class="btn btn-primary" value="Upload"> 
          </div>
    </form>
  
    </div>
</div>


<script src="custom.js"></script>
<?php
include_once "includes/footer.inc.php";
