<?php

if(isset($_POST['submitLocDetails'])){

    include_once 'capdb.inc.php';
    
    $sqlid= mysqli_query( $conn,"SELECT MAX( userID ) AS max FROM users;" );
    $res = mysqli_fetch_assoc( $sqlid);
    $maxID = $res['max'];

    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $postalcode = mysqli_real_escape_string($conn, $_POST['postalcode']);
    
    $sql = "INSERT INTO usersdetails (userID, country, city, address, postalcode) VALUES ($maxID,?,?,?,?);";


    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{


        mysqli_stmt_bind_param($stmt,"sssi", $country, $city, $address, $postalcode);
        mysqli_stmt_execute($stmt);
    }
        header('Location: ../index.php?registration=success');
        exit();
}