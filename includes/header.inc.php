<?php
session_start();
?>
<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/maxon/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jul 2021 15:05:52 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.min.css">

    <link rel="stylesheet" href="assets/css/meanmenu.css">

    <link rel="stylesheet" href="assets/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/odometer.min.css">

    <link rel="stylesheet" href="assets/css/nice-select.min.css">

    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">

    <link rel="stylesheet" href="assets/css/imagelightbox.min.css">

    <link rel="stylesheet" href="assets/css/style.css">   
    
    <script src="https://code.jquery.com/jquery.js"></script>

    <script src="assets/js/parsley.min.js"></script>
    
    <link rel = "stylesheet" href="assets/css/parsley.css">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="../assets/js/parsley.min.js"></script>
    <link rel = "stylesheet" href="../assets/css/parsley.css">

    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Maxon - Automobile Parts Shop HTML Template</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>

    <div class="preloader">
        <div class="loader">
            <div class="sbl-half-circle-spin">
                <div></div>
            </div>
        </div>
    </div>


    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <ul class="top-header-information">
                        <li>
                            <i class="flaticon-pin"></i>
                            565, Nyman Tower Melbourne, Australia
                        </li>
                        <li>
                            <i class="flaticon-clock"></i>
                            Monday 8:00 AM - 12:00 PM
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="top-header-optional">
                        <li>Currency: <b>USD</b></li>
                        <li>
                            <div class="dropdown language-switcher d-inline-block">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span>Language <i class='bx bx-chevron-down'></i></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="assets/img/english.png" class="shadow-sm" alt="flag">
                                        <span>English</span>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex align-items-center">
                                        <img src="assets/img/arab.png" class="shadow-sm" alt="flag">
                                        <span>Greek</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="middle-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="middle-header-search">
                        <form class="search-form">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search the entire store here">
                            </label>
                            <button type="submit">
                                <i class='bx bx-search-alt'></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="middle-header-optional">
                        <li>
                            <a href="wishlist.php"><i class="flaticon-heart"><span>0</span></i> Wishlist</a>
                        </li>
                        <li>
                            <a href="cart.php"><i class="flaticon-shopping-cart"><span>2</span></i> Add to Cart</a>
                        </li>
                        <?php
                        if(isset($_SESSION['email'])){
                            echo " <li>
                            <a href='includes/logout.inc.php' class='user-btn'>Logout</a>
                        </li>";
                        }else{
                            echo " <li>
                            <a href='my-account.php' class='user-btn'><i class='flaticon-enter'></i>Login /
                                Register</a>
                        </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area navbar-two">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="index.php">
                            <img src="assets/img/logo.png" alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo.png" alt="image">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link active">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="team.php" class="nav-link">
                                            Our Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="compare.php" class="nav-link">
                                            Compare
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="shop.php" class="nav-link">
                                    Shop
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Blog
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="blog.php" class="nav-link">
                                            Blog
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-right-sidebar.php" class="nav-link">
                                            Blog Right Sidebar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-details.php" class="nav-link">
                                            Blog Details
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.php" class="nav-link">
                                    Contact
                                </a>
                            </li>
                            <?php
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 1 || $_SESSION['role'] == 2  || $_SESSION['role'] == 3){
                                echo " <li class='nav-item'>
                                <a href='uploadProduct.php' class='nav-link'>
                                Upload a Part
                            </a>
                            </li>
                            ";
                                }
                            }
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 1){
                                echo " <li class='nav-item'>
                                <a href='../adminpage/index.php' class='nav-link'>
                                Admin Page
                            </a>
                            </li>
                            ";
                                }
                            }


                            ?>
                        </ul>
                        <div class="others-option d-flex align-items-center">
                            <div class="option-item">
                                <span>
                                    Hotline:
                                    <a href="tel:882563789966">(+357) 99982830</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
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
                                    <a href="tel:882563789966">(+357) 99982830</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>