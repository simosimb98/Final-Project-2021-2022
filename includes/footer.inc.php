<section class="footer-area pt-100 pb-70">
    <div class="container">


        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <a href="index.html">
                        <img src="assets/img/logo-2.png" alt="image">
                    </a>
                    <ul class="footer-social">
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-instagram'></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h2>Information</h2>
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bxs-phone'></i>
                            <span>Phone</span>
                            <p href="tel:882569756">(+357) 99982830</p>
                        </li>
                        <li>
                            <i class='bx bx-envelope'></i>
                            <span>Email</span>
                            <p href="sg.immbraem@edu.cut.ac.cy">sg.immbraem@edu.cut.ac.cy</p>
                        </li>
                        <li>
                            <i class='bx bx-map'></i>
                            <span>Address</span>
                            Archiepiskopou Kyprianou 30, Limassol 3036
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="newsletter-content">
                        <h2>Subscribe to our newsletter!</h2>
                        <form action="includes/regnews.inc.php" method="POST">
                            <input type="email" placeholder="Enter Email Address" name="email" style="height: 34px; width: 500px;">
                            <input type="submit" name="submit" value="Subscribe" class="btn btn-danger" style="margin-left: 505px; margin-top: -60px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section>


<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>
                        Copyright © 2021 Maxon. All Rights Reserved by
                        <a href="https://hibootstrap.com/" target="_blank">
                            HiBootstrap
                        </a>
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul>
                        <li>
                            <a href="terms-of-service.html">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="privacy-policy.html">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/popper.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/jquery.meanmenu.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/jquery.magnific-popup.min.js"></script>

<script src="assets/js/imagelightbox.min.js"></script>

<script src="assets/js/odometer.min.js"></script>

<script src="assets/js/jquery.nice-select.min.js"></script>

<script src="assets/js/jquery.appear.min.js"></script>

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/wow.min.js"></script>

<script src="assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

</body>

<?php

if (isset($_GET['item'])) {
    if ($_GET['item'] == 'allreadyincart') {
    echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "This item is allready in your cart!",
                showConfirmButton: false,
                timer: 15000                 
            }).then(function() {
                window.location="shop.php"
            })
            });                 
            </script>
                    ';
    }
    }

    if (isset($_GET['item'])) {
        if ($_GET['item'] == 'allreadyinwishlist') {
        echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "This item is allready in your wishlist!",
                    showConfirmButton: false,
                    timer: 5000                 
                }).then(function() {
                    window.location="shop.php"
                })
                });                 
                </script>
                        ';
        }
        }

if (isset($_GET['updateDetails'])) {
    if ($_GET['updateDetails'] == 'successfull') {
    echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "New details have been added!",
                showConfirmButton: false,
                timer: 1600                 
            }).then(function() {
            })
            });                 
            </script>
                    ';
    }
}


if (isset($_GET['registration'])) {
    if ($_GET['registration'] == 'success') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Register successful!",
                showConfirmButton: false,
                timer: 1600                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['registration'])) {
    if ($_GET['registration'] == 'successSorV') {
        echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Your account is up for review and will be activated shortly!",
                    showConfirmButton: false,
                    timer: 1600                 
                }).then(function() {
                })
                });                 
                </script>
                ';
    }
}


if (isset($_GET['login'])) {
    if ($_GET['login'] == 'unsuccessfull') {
        echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Your account has not been activated yet!",
            showConfirmButton: false,
            timer: 1600                 
        }).then(function() {
        })
        });                 
        </script>
        ';
    }
}



if (isset($_GET['email'])) {
    if ($_GET['email'] == 'doesnotExist') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "This email does not exist!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'noneLogin') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "You have been signed in successfully!",
                showConfirmButton: false,
                timer: 1600                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'wrongPass') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Wrong password entered!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emailExists') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "This email allready exists!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'wrongLogin') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Please check your credentials and try again!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['upload'])) {
    if ($_GET['upload'] == 'success') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Your images have been uploaded!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['upload'])) {
    if ($_GET['upload'] == 'wrongfileformat') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Allowed extensions are jpg, jpeg and png!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
                window.location = "uploadProductFiles.php";
            })
            });                 
            </script>
            ';
    }
}

if (isset($_GET['newsletter'])) {
    if ($_GET['newsletter'] == 'success') {
        echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Thanks for subscribing!",
            showConfirmButton: false,
            timer: 3500                 
        }).then(function() {
        })
        });                 
        </script>
        ';
    }
}

if (isset($_GET['newsletter'])) {
    if ($_GET['newsletter'] == 'fail') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Something went wrong, Please try again!",
                showConfirmButton: false,
                timer: 3500                 
            }).then(function() {
            })
            });                 
            </script>
            ';
    }
}
if (isset($_GET['mail'])) {
    if ($_GET['mail'] == 'send') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Thanks for contacting us. We will get back to you as
                soon as possible!",
                showConfirmButton: false,
                timer: 5000                 
            }).then(function() {
                window.location = "contactWithAccount.php";
            })
            });                 
            </script>
            ';
}
}

if (isset($_GET['mail'])) {
    if ($_GET['mail'] == 'sendagain') {
        echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Thanks for contacting us. We will get back to you as
                soon as possible!",
                showConfirmButton: false,
                timer: 5000                 
            }).then(function() {
                window.location = "contactWithAccount.php";
            })
            });                 
            </script>
            ';
}
}

if (isset($_GET['mail'])) {
if ($_GET['mail'] == 'notSend') {
echo '
        <script>
        $(document).ready(function(){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Something went wrong, Please try again!",
            showConfirmButton: false,
            timer: 5000                 
        }).then(function() {
        })
        });                 
        </script>
                ';
}
}

if (isset($_GET['deletion'])) {
    if ($_GET['deletion'] == 'successful') {
    echo '
            <script>
            $(document).ready(function(){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Your account has been deleted successfuly!",
                showConfirmButton: false,
                timer: 51000                 
            }).then(function() {
            })
            });                 
            </script>
                    ';
    }
    }

    if (isset($_GET['item'])) {
        if ($_GET['item'] == 'outofstock') {
        echo '
                <script>
                $(document).ready(function(){
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "This item is currently out of stock!",
                    showConfirmButton: false,
                    timer: 51000                 
                }).then(function() {
                    window.location="wishlist.php"
                })
                });                 
                </script>
                        ';
        }
        }

?>

<!-- Mirrored from templates.hibootstrap.com/maxon/default/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jul 2021 15:06:53 GMT -->

</html>

<!--Script to show login modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'loginuser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#loginuser").modal();
    </script>
<?php } ?>

<!--Script to show register modal when form is submitted-->
<?php if (isset($_GET['modal']) && 'registeruser' == $_GET['modal']) { ?>
    <script type='text/javascript'>
        $("#registeruser").modal();
    </script>
<?php } ?>

<!--Script to show shops modal when form is submitted-->
<?php 
if(isset($_GET['registration'])){
    if ($_GET['registration'] == 'shop'){
 ?>
    <script type='text/javascript'>
         if (window.location.hash == "shop") {
        $("#shops").modal("show");
    }
    </script>
<?php 
}
}
 ?>



