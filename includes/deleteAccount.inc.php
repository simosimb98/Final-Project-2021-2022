<?php

include_once 'capdb.inc.php';
     
    session_start();
    $userID = $_POST['userID'];
    
    $sql = "UPDATE users SET status = 0 WHERE userID = $userID";
    mysqli_query($conn, $sql);
    
    session_unset();
    session_destroy();

    header('Location: ../index.php?deletion=successful');
    exit();