<?php

include_once 'capdb.inc.php';

if(isset($_POST['submitLogin'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    require_once 'functions.inc.php';

    logInUser($conn, $email, $password);
}
else{
    header('Location: ../my-account.php');
    exit();
}