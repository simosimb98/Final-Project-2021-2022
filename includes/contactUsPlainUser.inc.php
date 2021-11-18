<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'capdb.inc.php';
    require_once 'functions.inc.php';

    $name = mysqli_real_escape_string($conn, $_POST['firstname']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $emailFrom = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['msg_subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    //Function to send email
    sendEmailPlainUser($emailFrom,$subject,$message);
    //Function to insert inquiry data i7n database
    addContactUsInquiry($conn, $name, $surname, $emailFrom, $phone, $subject,$message);


}else{
    header('Location:../contact.php');
    exit();
}
