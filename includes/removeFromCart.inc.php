<?php

session_start();
include_once "capdb.inc.php";

if(isset($_GET["action"])){
  if(isset($_GET['action']) == "delete"){

    foreach($_SESSION['cart'] as $keys => $values){

      if($values['part_id'] == $_GET['id']){
        unset($_SESSION['cart'][$keys]);
        $_SESSION['countcart']--;
        echo '<script>window.location="../cart.php"</script>';
      }
    }
  }
}