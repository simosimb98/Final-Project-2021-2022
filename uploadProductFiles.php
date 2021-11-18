<?php
include_once "includes/header.inc.php";
?>

<style>
  #drop_file_zone {
    background-color: #EEE;
    border: #999 5px dashed;
    width: 600px;
    height: 270px;
    padding: 8px;
    font-size: 18px;
  }

  #drag_upload_file {
    width: 50%;
    margin: 0 auto;
  }

  #drag_upload_file p {
    text-align: center;
  }

  #drag_upload_file #selectfile {
    display: none;
  }
</style>


<div class="col-lg-12 col-md-12">
  <div class="register-form">
    <form action="includes/uploadFiles.inc.php" method="post" enctype="multipart/form-data">
      <div id="drop_file_zone">
        <div id="drag_upload_file">
          <p>Select files from your computer</p>
          <p>Allowed formats are jpg, jpeg and png</p>
          <input type="file" class="file-move" name="image[]" multiple style="margin-left: 90px; margin-top: 10px;">
        <div style="margin-top: 20px; margin-left: 60px;">
          <input type="button" class="btn btn-danger" value="Cancel">
          <input type="submit" name="submitPhotos" class="btn btn-primary" value="Upload">
        </div>
        </div>
      </div>
    </form>

  </div>
</div>


<?php
include_once "includes/footer.inc.php";
