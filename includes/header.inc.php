<?php
session_start();
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
$res = preg_replace('/\?[^?]*$/', '', $escaped_url);
$_SESSION['lastVisitedPage'] = $res;
include_once 'includes/capdb.inc.php';
?>
<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/maxon/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jul 2021 15:05:52 GMT -->

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    
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

    <link rel="stylesheet" href="assets/css/myaccount_dropdown.css"> 
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    
    <script src="https://code.jquery.com/jquery.js"></script>
  
    <script src="assets/js/parsley.min.js"></script>
    
    <link rel = "stylesheet" href="assets/css/parsley.css">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="../assets/js/parsley.min.js"></script>
    <link rel = "stylesheet" href="../assets/css/parsley.css">

    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Maxon - Automobile Parts Shop HTML Template</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <script type="text/javascript">
        function searchq(){
            var searchTxt = $("input[name='search']").val();

            $.post("includes/search.inc.php", {searchVal: searchTxt}, function(output){
                $("#output").html(output);
            });
        }
    </script>
    
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="sbl-h alf-circle-spin">
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
                            Limassol, Cyprus University of Technology
                        </li>
                        <li>
                            <i class="flaticon-clock"></i>
                            Monday 8:00 AM - 12:00 PM
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="top-header-optional">
                        <li>Currency: <b>EU</b></li>
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
                <div class="col-lg-4">
                    <div class="middle-header-search" style="width: 350px;">
                        <form action="" method="POST" class="search-form">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="text" name="search" class="search-field" placeholder="Search the entire store here" onkeydown="searchq();"/>
                            </label>
                           <!-- <button style="margin-right: 190px;" type="submit">
                                <i class='bx bx-search-alt'></i>
                            </button> -->
                        </form>
                        <div class="dropdown" id ="output" style="position: absolute; z-index: 3;">

                        </div>
                  </div>
                </div>
                <div class="col-lg-5">
                    <ul class="middle-header-optional" style="margin-right: -300px;">
                    <?php
                    if(isset($_SESSION['wishlist']) && isset($_SESSION['countwishlist']) && isset($_SESSION['userID'])){
                        echo '<li class="cart">
                            <a href="wishlist.php"><i class="flaticon-heart"><span>'.$_SESSION['countwishlist'].'</span></i>Wishlist</a>
                        </li>';
                    }else{
                        echo '<li class="cart">
                        <a href="wishlist.php"><i class="flaticon-heart"><span>0</span></i>Wishlist</a>
                    </li>';
                    }
                        
                        ?>

                        <?php
                    if(isset($_SESSION['cart']) && isset($_SESSION['countcart']) && isset($_SESSION['userID'])){
                        echo '<li class="cart">
                            <a href="cart.php"><i class="flaticon-shopping-cart"><span>'.$_SESSION['countcart'].'</span></i>My Cart</a>
                        </li>';
                    }else{
                        echo '<li class="cart">
                        <a href="cart.php"><i class="flaticon-shopping-cart"><span>0</span></i>My Cart</a>
                    </li>';
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) ){
                       $uID = $_SESSION['userID'];       
                       $sql = "SELECT *, SUM(orderprice) AS odr
                                FROM orders AS a
                                INNER JOIN orders_products AS b ON a.orderID = b.orderID
                                INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
                                INNER JOIN users AS d ON a.userID = d.userID
                                WHERE c.userID = $uID AND a.orderstatus = 0 GROUP BY b.orderID";

                               $result = mysqli_query($conn, $sql);
                               $resultCheck = mysqli_num_rows($result);
                    ?>
                    <li class="cart">
                        <a href="orders.php"><i class="flaticon-online-payment"><span><?php echo $resultCheck;?></span></i>Orders</a>
                    </li>

                    <?php
                     $sqlwa = "SELECT * FROM
                                waittinglist AS a
                                INNER JOIN partsdetails AS b ON a.carpartID = b.carpartID
                                WHERE a.userID = $uID AND b.quantity !=0;";

                    $resultwa = mysqli_query($conn, $sqlwa);
                    $resultCheckwa = mysqli_num_rows($resultwa);
                    ?>
                  
                    <li>
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-appointment"><span><?php echo $resultCheckwa?></span></i>Waitting list
                            </a>

                              <!-- Dropdown - Messages -->
                              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Waitting list notifications
                                </h6>
                            

                            <?php
                            $sqlWAL = "SELECT * FROM
                                        waittinglist AS a
                                        INNER JOIN partsdetails AS b ON a.carpartID = b.carpartID
                                        WHERE a.userID = $uID;
                                        ";

                                        $resultWAL = mysqli_query($conn, $sqlWAL);

                                    while($rowWAL = mysqli_fetch_assoc($resultWAL)){
                                        if($rowWAL['quantity'] != 0){
                                ?>

                                <a class="dropdown-item d-flex align-items-center" href="products-details.php?id=<?php echo $rowWAL['carpartID']?>">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $rowWAL['productname']?> IS BACK IN STOCK!</div>
                                    </div>
                                </a>
                                <?php
                                 }
                                ?>
                    <?php
                     }
                    }
                    ?>   
                
                        <?php
                        if(isset($_SESSION['role']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 4)){
                            echo " <li class='cart'>
                            <div class='dropdown' style='position: relative; z-index: 2;'>
                                <button class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";?><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname'];?><?php echo "</button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='includes/logout.inc.php'>Logout</a>
                                    <a class='dropdown-item' href='editProfile.php'>Edit profile</a>
                                    <a class='dropdown-item' href='transactionHistory.php'>Transaction History</a>
                                </div>
                                </div>

                        </li>";
                        }else if(isset($_SESSION['role']) && ($_SESSION['role'] == 2 || $_SESSION['role'] == 3)){
                            echo " <li class='cart'>
                            <div class='dropdown' style='position: relative; z-index: 2;'>
                                <button class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";?><?php echo $_SESSION['name'] . ' ' . $_SESSION['surname'];?><?php echo "</button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='includes/logout.inc.php'>Logout</a>
                                    <a class='dropdown-item' href='editProfile.php'>Edit profile</a>
                                    <a class='dropdown-item' href='editProducts.php'>Edit products</a>
                                    <a class='dropdown-item' href='transactionHistory.php'>Transaction History</a>
                                </div>
                                </div>

                        </li>";
                        }
                        else{
                            echo " <li class='cart'>
                            <a data-toggle='modal' href='#loginuser' class='user-btn'><i class='flaticon-enter'></i>Login /
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
                                <a href="about.php" class="nav-link">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="shop.php" class="nav-link">
                                    Shop
                                </a>
                            </li>
                            <?php

                            if(isset($_SESSION['userID'])){
                           echo ' <li class="nav-item">
                                <a href="contactWithAccount.php" class="nav-link">
                                    Contact
                                </a>
                            </li> ';
                            }else{
                                echo ' <li class="nav-item">
                                <a href="contact.php" class="nav-link">
                                    Contact
                                </a>
                            </li> ';
                            }
                            ?>
                            <?php
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role'] == 2  || $_SESSION['role'] == 3){
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

<!-- Login Modal HTML -->
<div id="loginuser" class="modal fade">
    <div class="modal-dialog ">
    <div class="modal-content ">
        <form id="loginForm" action="includes/login.inc.php" method="POST" data-parsley-validate="">
        <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <input type="text" data-parsley-required-message="Please enter your email" class="form-control" name = "email" placeholder="Email" data-parsley-type="email" required="">
            </div>
            <div class="form-group">
            <input type="password" data-parsley-required-message="Please enter your password" class="form-control" name = "password" placeholder="Password" data-parsley-length="[6, 25]" required="">
            </div>
            <div class="form-group">
            </div>
            <a data-toggle="modal" href="#registeruser" style="color: #9e322c; margin-left: 80px;">Don't have an account? Click here to register</a>
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Login" name="submitLogin"></input>
        </div>
        </form>
       </div>
    </div>
</div>

<!-- Register Modal HTML -->
<div id="registeruser" class="modal fade" >
    <div class="modal-dialog ">
    <div class="modal-content ">
        <form id="registerForm" action="includes/register.inc.php" method="POST" data-parsley-validate="">
        <div class="modal-header">
            <h4 class="modal-title">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <div style="float: left;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" data-parsley-required-message="Please enter your name" name = "firstname" class="form-control" placeholder="Name" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
                <div class="valid-feedback">
                    Looks good!
                    </div>
            </div>
            <div class="form-group" >
                <label>Surname</label>
                <input type="text" data-parsley-required-message="Please enter your last name" name = "surname" class="form-control" placeholder="Surname" data-parsley-length="[4, 25]" data-parsley-group="block1" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Email</label>
                <input type="email" data-parsley-required-message="Please enter your email address" name = "email" class="form-control" placeholder="Email" data-parsley-type="email" required="">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" data-parsley-required-message="Please enter your phone number" name = "phone" class="form-control" placeholder="Phone" data-parsley-minlength="8" 
                    data-parsley-maxlength="16" required="">
            </div>
            </div>
            <div style="float: left;">
            <div class="form-group">
                <label>Password</label>
                <input type="password" data-parsley-required-message="Please enter a password" name = "password" id = "password" class="form-control" placeholder="Password" data-parsley-length="[6, 25]" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
            <label>Repeat Password</label>
                <input type="password" class="form-control" name="Repassword" required="" data-parsley-equalto="#password"
                data-parsley-equalto-message="Please enter the same password" placeholder="Repeat password" data-parsley-required-message="Please enter your password">
            </div>
            </div>
            <div style="float: left;">
        <div class="form-group">
                <label>City</label>
                <input type="text" data-parsley-required-message="Please enter your city" name = "city" class="form-control" placeholder="City" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
                <div class="valid-feedback">
                    Looks good!
                    </div>
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Country</label>
                <input type="text" data-parsley-required-message="Please enter your last country" name = "country" class="form-control" placeholder="Country" data-parsley-length="[1, 25]" data-parsley-group="block1" required="">
            </div>
            </div>
            <div style="float: left;">
            <div class="form-group">
                <label>Address</label>
                <input type="text" data-parsley-required-message="Please enter your address" name = "address" class="form-control" placeholder="Address" data-parsley-length="[1,40]" required="">
            </div>
            </div>
            <div style="float: right;">
            <div class="form-group">
                <label>Postal Code</label>
                <input type="number" data-parsley-required-message="Please enter your postal code" name = "postalcode" class="form-control" placeholder="Postal Code" data-parsley-minlength="4" 
                    data-parsley-maxlength="16" required="">
            </div>    
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
        </div>
        <div class="modal-footer d-flex justify-content-between">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Register" name="submitRegister"></input>
        </div>
        </form>
       </div>
    </div>
</div>

