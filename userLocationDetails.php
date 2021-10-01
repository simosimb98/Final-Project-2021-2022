<?php
include_once "includes/header.inc.php";
include_once "includes/capdb.inc.php";

?>

<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Location Details</h2>
                        <body>
                        <form id = "registerForm" action = "includes/userLocationDetails.inc.php" method = "POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" data-parsley-required-message="Please enter your city" name = "city" class="form-control" placeholder="City" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" data-parsley-required-message="Please enter your last country" name = "country" class="form-control" placeholder="Country" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" data-parsley-required-message="Please enter your address" name = "address" class="form-control" placeholder="Address" data-parsley-length="[1,40]" required="">
                            </div>
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="number" data-parsley-required-message="Please enter your postal code" name = "postalcode" class="form-control" placeholder="Postal Code" data-parsley-minlength="4" 
                                 data-parsley-maxlength="16" required="">
                            </div>      
                            <?php
                        $sqlid= mysqli_query( $conn,"SELECT MAX( userID ) AS max FROM users;" );
                        $res = mysqli_fetch_assoc( $sqlid);
                        $maxID = $res['max'];

                        $checkRole = mysqli_query($conn, "SELECT role FROM users WHERE userID = $maxID;");
                        $result = mysqli_fetch_array($checkRole);
                        $rolecheck = $result['role'];

                        if($rolecheck == 2 || $rolecheck == 3){
                            
                           echo '  <div class="form-group">
                            <label>Shop</label>
                            <input type="text" data-parsley-required-message="Please enter your shop" name = "shop" class="form-control" placeholder="Enter your shops name" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
                            <div class="valid-feedback">
                                Looks good!
                                </div>
                        </div>';
                        }

                        ?>                                
                            <div class="form-group">
                            <button type="submit" value = "register" name = "submitLocDetails" style="margin-top: 20px;">Finish Registration</button>
                            </div>
                        </form>
                        </body>
                </div>
            </div>
<?php
include_once "includes/footer.inc.php";
