<?php
include_once "includes/header.inc.php";
?>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-option d-flex align-items-center">
                            <div class="option-item">
                                <span>
                                    Hotline:
                                    <a href="tel:99982830">(+357) 99982830</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-banner-area item-bg2">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Contact Us</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class='bx bx-envelope'></i>
                        </div>
                        <h3>Email Here</h3>
                        <p>simimb98@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <h3>Location</h3>
                        <p>Limassol, Cyprus University of Technology</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact-info-box">
                        <div class="icon">
                            <i class='bx bxs-phone-call'></i>
                        </div>
                        <h3>Call Here</h3>
                        <p><a href="tel:99982830">+357 99982830</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-area pb-100">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Need help with something? Leave us a message and we'll get back to you as soon as possible!</p>
            </div>
            <div class="contact-form">
                <form id="contactForm" action="includes/contactUsPlainUser.inc.php" method="POST" data-parsley-validate="">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" data-parsley-required-message="Please enter your name" name = "firstname" class="form-control" placeholder="Name" data-parsley-length="[4, 25]" data-parsley-group="block1" required=""> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" data-parsley-required-message="Please enter your last name" name = "surname" class="form-control" placeholder="Surname" data-parsley-length="[4, 25]" data-parsley-group="block1" required=""> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Email" data-parsley-type="email" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" data-parsley-required-message="Please enter your phone number" name = "phone" class="form-control" placeholder="Phone" data-parsley-minlength="8" 
                                 data-parsley-maxlength="16" required="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                data-parsley-length="[10, 100]" required="" data-parsley-required-message="Please enter your subject" style="width: 990px;">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                                data-parsley-required-message="Please enter your message"
                                data-parsley-length="[20, 1000]" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input type="submit" name= "submitMessageFromUser" value = "Send message" class="default-btn">
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.1775575692186!2d33.03960696536841!3d34.67546793044106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14e73304baa68313%3A0x24ce0b4214ec0252!2sCyprus%20University%20of%20Technology!5e0!3m2!1sen!2s!4v1635676970687!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

<?php
include_once "includes/footer.inc.php";
?>