<?php
include_once "includes/header.inc.php";
?>

<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Location Details</h2>
                        <body>
                        <form id = "registerForm" action = "includes/register.inc.php" method = "POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" data-parsley-required-message="Please enter your name" name = "firstname" class="form-control" placeholder="City" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" data-parsley-required-message="Please enter your last name" name = "surname" class="form-control" placeholder="Country" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Address" data-parsley-type="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="number" data-parsley-required-message="Please enter your phone number" name = "phone" class="form-control" placeholder="Postal Code" data-parsley-minlength="8" 
                                 data-parsley-maxlength="16" required="">
                            </div>                                      
                            <div class="form-group">
                            <button type="submit" value = "register" name = "submitRegister" style="margin-top: 20px;">Finish Registration</button>
                            </div>
                        </form>
                        </body>
                </div>
            </div>
<?php
include_once "includes/footer.inc.php";
