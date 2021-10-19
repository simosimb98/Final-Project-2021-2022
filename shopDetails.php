<?php
include_once "includes/header.inc.php";
include_once "includes/capdb.inc.php";

?>

<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Location Details</h2>
                        <body>
                        <form id = "registerForm" action = "includes/shopDetails.inc.php" method = "POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>*Shop</label>
                                <input type="text" data-parsley-required-message="Please enter your shops name" name = "shop" class="form-control" placeholder="Shop" data-parsley-length="[1, 50]" data-parsley-group="block1" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Cooperates</label>
                                <input type="text" data-parsley-required-message="Please enter any cooperates" name = "cooperates" class="form-control" placeholder="Cooperates" data-parsley-length="[1, 70]" data-parsley-group="block1">
                            </div>     
                            <div class="form-group">
                            <button type="submit" value = "register" name = "submitShopDetails" style="margin-top: 20px;">Finish Registration</button>
                            </div>
                        </form>
                        </body>
                </div>
            </div>
<?php
include_once "includes/footer.inc.php";
