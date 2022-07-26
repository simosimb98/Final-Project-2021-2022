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

    $currentUserID = $_SESSION['userID'];

    $productDetailsQuery = "INSERT INTO partsdetails (userID, car_brand, car_model, year, engine_size, category, productname, quantity, price, shippingcost, description) VALUES ($currentUserID,?,?,?,?,?,?,?,?,?,?);";

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