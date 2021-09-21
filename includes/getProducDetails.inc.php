<?php

if(isset($_POST['registerProductDetails'])){

    include_once 'capdb.inc.php';

    $brand = mysqli_real_escape_string($conn, $_POST['carbrand']);
    $model = mysqli_real_escape_string($conn, $_POST['carmodel']);
    $enginesize = mysqli_real_escape_string($conn, $_POST['enginesize']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $productDetailsQuery = "INSERT INTO partsdetails (productname,car_brand, car_model, year, engine_size, quantity, description) VALUES (?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $productDetailsQuery)){
        echo "SQL error";
    }
    else{

        mysqli_stmt_bind_param($stmt, "sssifis", $productname, $brand, $model, $year, $enginesize, $quantity, $description);
        mysqli_stmt_execute($stmt);
    }
    header('Location: ../index.php');
    exit();
}else{
    header('Location: ../uploadProduct.php?error=fatalError');
}