<?php
include_once 'includes/header.inc.php';
?>

<section class="intro-single">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                            <?php
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 'stmtFailed'){
                                    echo '<p class = "text-danger text-center " >Something went wrong! Please try again.</p>';
                                }
                                if($_GET['error'] == 'somethingWrong'){
                                    echo '<p class = "text-danger text-center " >Something went wrong! Please try again.</p>';
                                }
                                if($_GET['error'] == 'currentPasswordWrong'){
                                    echo '<p class = "text-danger text-center " >Current password Wrong! Please try again.</p>';
                                }
                                if($_GET['error'] == 'passwordsDontMatch'){
                                    echo '<p class = "text-danger text-center " >Passwords must match! Please try again.</p>';
                                }
                            }
                            
                            ?>
                                <div class="e-profile">
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" novalidate="" action="includes/editProfile.inc.php" method="POST">
                                                <?php
                                                echo '   
                                             <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input class="form-control" type="text" name="name" value="' . $_SESSION['name'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Surname</label>
                                                                    <input class="form-control" type="text" name="surname"  value="' . $_SESSION['surname'] . '">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="email" name="email" value="' . $_SESSION['email'] . '">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input class="form-control" type="number" name="phone" value="' . $_SESSION['phone'] . '">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input class="form-control" type="text" name="country" value="' . $_SESSION['country'] . '">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input class="form-control" type="text" name="city" value="' . $_SESSION['city'] . '">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input class="form-control" type="text" name="address" value="' . $_SESSION['address'] . '">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                                <input class="form-control" type="number" name="postalcode" value="' . $_SESSION['postalcode'] . '">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-info" type="submit" name = "submit">Save Changes</button>
                                                    </div>
                                                </div>';

                                                ?>
                                                    <div class="col d-flex justify-content-start">
                                                        <a href="#deleteAccount" data-toggle="modal" 
                                                        class="btn btn-danger" style="position: relative; bottom: 37px;">Delete Account</a>
                                                    </div>

                                                    <div class="col d-flex justify-content-center">
                                                        <a href="#changePassword" 
                                                        data-toggle="modal" style="position: relative; bottom: 60px; color: red;">Click here to change your password</a>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

         <!-- Delete Modal HTML -->
    <div id="deleteAccount" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteAccount.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Account?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account?</p>
                        <p class="text-warning"><small>This action can not be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="userID" value= '<?php echo $_SESSION['userID']?>'>
                        <button type="submit" value="Yes" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!--Change password modal HTML -->
    <div id="changePassword" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/changePassword.inc.php" method="POST" data-parsley-validate="">
                    <div class="modal-header">
                        <h4 class="modal-title">Change password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                                <div class="form-group">
                                    <label>Current password</label>
                                    <input type="password" data-parsley-required-message="Please enter a password" name = "currentPassword" class="form-control" placeholder="Password" data-parsley-length="[6, 25]" required="">
                                </div>
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" data-parsley-required-message="Please enter your new password" name = "newPassword" id = "newpassword" class="form-control" placeholder="Password" data-parsley-length="[6, 25]" required=""> 
                                </div>
                                <div class="form-group">
                                    <label>Repeat<span class="d-none d-xl-inline"> new password</span></label>
                                    <input type="password" class="form-control" name="repeatNewPassword" required="" data-parsley-equalto="#newpassword"
                                    data-parsley-equalto-message="Please enter the same password" placeholder="Repeat password" data-parsley-required-message="Please enter your password">
                                </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" value="Yes" class="btn btn-danger">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</section>

<?php
include_once 'includes/footer.inc.php';
