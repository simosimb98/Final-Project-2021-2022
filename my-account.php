<?php
include_once "includes/header.inc.php";
?>
<style>
    .registertxt{
        margin-left: 210px;
    }
</style>
    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>My Account</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="my-account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="login-form mb-30">
                        <h2>Login</h2>
                        <form id = "loginForm" action = "includes/login.inc.php" method = "POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" data-parsley-required-message="Please enter your email" class="form-control" name = "email" placeholder="Email" data-parsley-type="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" data-parsley-required-message="Please enter your password" class="form-control" name = "password" placeholder="Password" data-parsley-length="[6, 25]" required="">
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <!--  <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkme">
                                        <label class="form-check-label" for="checkme">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password">
                                    <a href="#" class="lost-your-password">Forgot your password?</a>
                                </div>-->
                            </div>
                            <button type="submit" name = "submitLogin">Login</button>
                        </form>
                        <div class="registertxt">
                            <a href="register.php" style="color: blue">Create a new account</a>
                    </div>
                </div>
       
<?php
include_once "includes/footer.inc.php";
?>