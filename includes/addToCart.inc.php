<?php

session_start();
include_once "capdb.inc.php";

if(isset($_POST['addToCart'])){

  if(isset($_SESSION['cart'])){

    $item_array_id = array_column($_SESSION['cart'], "part_id");
    if(!in_array($_GET['id'], $item_array_id)){

      $count = count($_SESSION['cart']);
     
      $item_array = array(
        'part_id' => $_GET["id"],
        'part_name' => $_POST['prname_shop'],
        'part_photo' => $_POST['photo_shop'],
        'part_price' => $_POST['price_shop'],
        'part_quantity' => $_GET["quantity"]

      );
      $_SESSION['cart'][$count] = $item_array;

    }else{
      header('Location: ../shop.php?item=allreadyincart');
      exit();
    }

 }else{

  $item_array = array(

    'part_id' => $_GET["id"],
    'part_name' => $_POST['prname_shop'],
    'part_photo' => $_POST['photo_shop'],
    'part_price' => $_POST['price_shop'],
    'part_quantity' => $_GET["quantity"]

  );

  $_SESSION['cart'][0] = $item_array;

 }
 $counter = 1;
 $_SESSION['countcart'] ++;

 header('Location: ../shop.php');
 exit();      

}

else if(isset($_POST['addToWishlist'])){
  if(isset($_SESSION['wishlist'])){

    $item_array_id = array_column($_SESSION['wishlist'], "part_id");
    if(!in_array($_GET['id'], $item_array_id)){

      $count = count($_SESSION['wishlist']);
     
      $item_array = array(
        'part_id' => $_GET["id"],
        'part_name' => $_POST['prname_shop'],
        'part_photo' => $_POST['photo_shop'],
        'part_price' => $_POST['price_shop']

      );
      $_SESSION['wishlist'][$count] = $item_array;

    }else{
      header('Location: ../shop.php?item=allreadyinwishlist');
      exit();
    }

 }else{

  $item_array = array(

    'part_id' => $_GET["id"],
    'part_name' => $_POST['prname_shop'],
    'part_photo' => $_POST['photo_shop'],
    'part_price' => $_POST['price_shop']

  );

  $_SESSION['wishlist'][0] = $item_array;

 }
 $wishlistCounter = 1;
 $_SESSION['countwishlist'] ++;

 header('Location: ../shop.php');
 exit();  
}





