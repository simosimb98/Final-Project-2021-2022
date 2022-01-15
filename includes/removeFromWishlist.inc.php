<?php

session_start();
include_once "capdb.inc.php";

if(isset($_GET["action"])){
  if(isset($_GET['action']) == "delete"){

    foreach($_SESSION['wishlist'] as $keys => $values){

      if($values['part_id'] == $_GET['id']){
        unset($_SESSION['wishlist'][$keys]);
        $_SESSION['countwishlist']--;
        echo '<script>window.location="../wishlist.php"</script>';
      }
    }
  }
}