<?php

if(isset($_POST['submitShopDetails'])){

    include_once 'capdb.inc.php';
    
    $sqlid= mysqli_query( $conn,"SELECT MAX( userID ) AS max FROM users;" );
    $res = mysqli_fetch_assoc( $sqlid);
    $maxID = $res['max'];

    
    $shop = mysqli_real_escape_string($conn,$_POST['shop']);
    $cooperates = mysqli_real_escape_string($conn, $_POST['cooperates']);
    
    $sql = "INSERT INTO shops (userID, shop, cooperates) VALUES ($maxID,?,?);";

             
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{

        mysqli_stmt_bind_param($stmt,"ss", $shop, $cooperates);
        mysqli_stmt_execute($stmt);
    }
        header('Location: ../index.php?registration=successSorV');
        exit();  
}