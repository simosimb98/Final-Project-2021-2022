<?php
include_once "includes/header.inc.php";
?>


<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Register</h2>
                        <body>
                        <form id = "registerForm" action = "includes/register.inc.php" method = "POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" data-parsley-required-message="Please enter your name" name = "firstname" class="form-control" placeholder="Name" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" data-parsley-required-message="Please enter your last name" name = "surname" class="form-control" placeholder="Name" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Email" data-parsley-type="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" data-parsley-required-message="Please enter your phone number" name = "phone" class="form-control" placeholder="Phone" data-parsley-minlength="8" 
                                 data-parsley-maxlength="16" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" data-parsley-required-message="Please enter a password" name = "password" class="form-control" placeholder="Password" data-parsley-length="[6, 25]" required="">
                            </div>
                            <div class="form-group">
                                <label>Select your role</label>
                            </div>
                            <div>
                                <input type="radio" id="role1" name="role" value="2" required="">
                                <label for="role1" display:> Shop owner</label>
                                <input type="radio" id="role2" name="role" value="3">
                                <label for="role2"> Vendor</label>
                                <input type="radio" id="role3" name="role" value="4">
                                <label for="role3"> Shopper</label>
                            </div>
                            <div class="form-group">
                            <button type="submit" value = "register" name = "submitRegister" style="margin-top: 20px;">Register Now</button>
                            </div>
                        </form>
                        </body>
                </div>
            </div>
<?php
include_once "includes/footer.inc.php";
