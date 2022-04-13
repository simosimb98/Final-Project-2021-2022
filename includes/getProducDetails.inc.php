<?php
session_start();

if(isset($_POST['registerProductDetails'])){

    include_once 'capdb.inc.php';

    $brand = mysqli_real_escape_string($conn, $_POST['carbrand']);
    $model = mysqli_real_escape_string($conn, $_POST['carmodel']);
    $enginesize = mysqli_real_escape_string($conn, $_POST['enginesize']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $shipping = mysqli_real_escape_string($conn, $_POST['shipping']);
    $categoryID;

    if($category == "Oils and Fluids"){
        $categoryID = 1;
    }else if($category == "Brake System"){
        $categoryID = 2;
    }else if($category == "Filters"){
        $categoryID = 3;
    }else if($category == "Engine"){
        $categoryID = 4;
    }else if($category == "Windscreen cleaning system"){
        $categoryID = 5;
    }else if($category == "Ingnition and Glowplug System"){
        $categoryID = 6;
    }else if($category == "Suspension and arms"){
        $categoryID = 7;
    }else if($category == "Electrics"){
        $categoryID = 8;
    }else if($category == "Damping"){
        $categoryID = 9;
    }else if($category == "Belts chains rollers"){
        $categoryID = 10;
    }else if($category == "Body"){
        $categoryID = 11;
    }else if($category == "Heater"){
        $categoryID = 12;
    }else if($category == "Gaskets and sealing rings"){
        $categoryID = 13;
    }else if($category == "Exhaust system"){
        $categoryID = 14;
    }else if($category == "Interior and Comfort"){
        $categoryID = 15;
    }else if($category == "Fuel supply system"){
        $categoryID = 16;
    }else if($category == "Steering"){
        $categoryID = 17;
    }else if($category == "Clutch parts"){
        $categoryID = 18;
    }else if($category == "Transmission"){
        $categoryID = 19;
    }else if($category == "Air Conditioning"){
        $categoryID = 20;
    }else if($category == "Bearings"){
        $categoryID = 21;
    }else if($category == "Propshafts and Differentials"){
        $categoryID = 22;
    }else if($category == "Towbar parts"){
        $categoryID = 23;
    }else if($category == "Sensors Relays Control Units"){
        $categoryID = 24;
    }else if($category == "Repair kits"){
        $categoryID = 25;
    }else if($category == "Pipes and Hoses"){
        $categoryID = 26;
    }else{
        $categoryID = 27;
    }

    $currentUserID = $_SESSION['userID'];

    $productDetailsQuery = "INSERT INTO partsdetails (userID, categoryID, car_brand, car_model, year, engine_size, category, productname, quantity, price, shippingcost, description) VALUES ($currentUserID,$categoryID,?,?,?,?,?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $productDetailsQuery)){
        echo "SQL error";
    }
    else{

        mysqli_stmt_bind_param($stmt, "ssidssidds", $brand, $model, $year, $enginesize, $category, $productname, $quantity, $price, $shipping, $description);
        mysqli_stmt_execute($stmt);
    }
    header('Location: ../uploadProductFiles.php');
    exit();
}else{
    header('Location: ../uploadProduct.php?error=fatalError');
}