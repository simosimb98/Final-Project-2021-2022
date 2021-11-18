<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'capdb.inc.php';
    require_once 'functions.inc.php';

    session_start();
    $userID = (int)$_SESSION['userID'];
    $name =$_SESSION['name'];
    $surname = $_SESSION['surname'];
    $phone = $_SESSION['phone'];
    $emailFrom = $_SESSION['email'];
    $subject = $_POST['msg_subject'];
    $message = $_POST['message'];

    //Function to send email
    sendEmail($emailFrom,$subject,$message);
    //Function to insert inquiry data i7n database
    addContactUsInquiry($conn, $name, $surname, $emailFrom, $phone, $subject,$message);


}else{
    header('Location:../contactWithAccount.php');
    exit();
}
