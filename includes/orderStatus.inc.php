<?php

include_once 'capdb.inc.php';

if(isset($_POST['orderStatus'])){

    $orderStatus = mysqli_real_escape_string($conn, $_GET['orderID']);

    $sql = "UPDATE orders SET orderstatus = 1 WHERE orderID = $orderStatus;";
    mysqli_query($conn, $sql);

    echo "<script>
          window.history.back();
          </script>";
}