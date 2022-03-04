<?php

include_once 'capdb.inc.php';

if (isset($_POST['carpartID'])  && !empty($_POST['carpartID'])) {

    $param_id = $_POST['carpartID'];

    $sql = "DELETE FROM partsdetails WHERE carpartID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../editProducts.php?partdeletion=success');
            exit();
        } else {
            header('Location: ../admins.php?partdeletion=error');
            exit();
        }
    }

} else {
    if (empty($_POST['userID'])) {
        header('Location: ../admins.php?partdeletion=empty');
        exit();
    }
}