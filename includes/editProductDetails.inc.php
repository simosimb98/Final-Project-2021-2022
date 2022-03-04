<?php

include_once 'capdb.inc.php';

if(isset($_POST['editproductID'])){

$partID = mysqli_real_escape_string($conn, $_POST['editproductID']);
$productName = mysqli_real_escape_string($conn, $_POST['name']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$shipping = mysqli_real_escape_string($conn, $_POST['shipping']);
$brand = mysqli_real_escape_string($conn, $_POST['carbrand']);
$model = mysqli_real_escape_string($conn, $_POST['carmodel']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$engine = mysqli_real_escape_string($conn, $_POST['enginesize']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

$sql = "UPDATE partsdetails SET car_brand = ?, car_model = ?, year = ?, engine_size = ?, category = ?, productname = ?,
        quantity = ?, price = ?, shippingcost = ?, description = ? WHERE carpartID = ?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../editProducts.php?error=stmtFailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssidssiddsi", $brand, $model, $year, $engine, $category, $productName,
                                                        $quantity, $price, $shipping, $description, $partID);

                                                
        if (!mysqli_stmt_execute($stmt)) {
        header('Location: ../editProducts.php?stmtFailed');
        exit();
    } else {
        header('Location: ../editProducts.php?updateDetails=successfull');
        exit();
    }
}