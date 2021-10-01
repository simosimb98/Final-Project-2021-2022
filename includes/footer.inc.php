<section class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <a href="index.html">
                            <img src="assets/img/logo-2.png" alt="image">
                        </a>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
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
                                    <i class='bx bxl-pinterest-alt'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h2>Recent Post</h2>
                        <div class="footer-post">
                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="#">Electronic Car Protect Air Pollution</a>
                                    </h4>
                                    <span>24 Dec 2021</span>
                                </div>
                            </article>
                            <article class="item">
                                <a href="#" class="thumb">
                                    <span class="fullimage cover bg2" role="img"></span>
                                </a>
                                <div class="info">
                                    <h4 class="title usmall">
                                        <a href="#">Automotive Advancements to Look Forward</a>
                                    </h4>
                                    <span>25 Dec 2021</span>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h2>Quick Links</h2>
                        <ul class="quick-links">
                            <li>
                                <i class='bx bxs-chevrons-right'></i>
                                <a href="#">About Company</a>
                            </li>
                            <li>
                                <i class='bx bxs-chevrons-right'></i>
                                <a href="#">Gallery</a>
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
                                <a href="tel:882569756">882-569-756</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <span>Email</span>
                                <a
                                    href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#48202d242427082529302726662b2725"><span
                                        class="__cf_email__"
                                        data-cfemail="127a777e7e7d527f736a7d7c3c717d7f">[email&#160;protected]</span></a>
                            </li>
                            <li>
                                <i class='bx bx-map'></i>
                                <span>Address</span>
                                175 5th Ave Premium Area, New York
                            </li>
                        </ul>
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

    <script src="assets/js/contact-form-script.js"></script>

    <script src="assets/js/wow.min.js"></script>

    <script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <?php
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
                window.location = "index.php";
            })
            });                 
            </script>
            ';
          }
        }

        if (isset($_GET['login'])) {
            if ($_GET['login'] == 'successfull') {
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
                    window.location = "index.php";
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
                        window.location = "index.php";
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
                        window.location = "my-account.php";
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
                            window.location = "my-account.php";
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
                                window.location = "register.php";
                            })
                            });                 
                            </script>
                            ';
                          }
                        }
?>

</body>

<!-- Mirrored from templates.hibootstrap.com/maxon/default/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jul 2021 15:06:53 GMT -->

</html>
