<?php

include_once 'capdb.inc.php';
session_start();

if(isset($_POST['modQuantity']) && isset($_POST['part_name'])){

    foreach($_SESSION['cart'] as $keys => $values){

        if($values['part_id'] == $_POST['part_id']){

            $_SESSION['cart'][$keys]['part_quantity'] = $_POST['modQuantity'];

            echo "<script>
            window.history.back();
            </script>";

        }
    }
}
