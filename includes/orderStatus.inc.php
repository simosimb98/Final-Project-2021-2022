<?php
require_once 'capdb.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['orderStatus'])){

    $orderStatus = mysqli_real_escape_string($conn, $_GET['orderID']);
  
    $name = $_GET['name'];
    $surname = $_GET['surname'];
    $email = $_GET['email'];
    $orderprice = $_GET['orderprice'];


    $sql = "UPDATE orders SET orderstatus = 1 WHERE orderID = $orderStatus;";
    mysqli_query($conn, $sql);

   sendDeliveredEmail($name, $surname, $email, $orderprice);

}