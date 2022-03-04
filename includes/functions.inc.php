<?php
session_start();
include_once "includes/capdb.inc.php";

function logInUser($conn, $email, $password)
{

    $userIDExists = emailExists($conn, $email);
    if ($userIDExists === false) {
        $_SESSION['lastVisitedPage'] .= '?error=wrongLogin';
        header('location: ' . $_SESSION['lastVisitedPage']);
        exit();
    }
    $passwordHashed = $userIDExists['password'];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        $_SESSION['lastVisitedPage'] .= '?error=wrongPass';
        header('location: ' . $_SESSION['lastVisitedPage']);
        exit();
        
    } else if ($checkPassword === true) {

        $_SESSION['userID'] = $userIDExists['userID'];

        $checkStatus = mysqli_query($conn,"SELECT status FROM users WHERE userID = '".$_SESSION['userID']."';");
        $result = mysqli_fetch_array($checkStatus);
        $status = $result['status'];
        
        if($status == 1){

        $_SESSION['name'] = $userIDExists['name'];
        $_SESSION['surname'] = $userIDExists['surname'];
        $_SESSION['phone'] = $userIDExists['phone'];
        $_SESSION['email'] = $userIDExists['email'];
        $_SESSION['role'] = $userIDExists['role'];
        $_SESSION['country'] = $userIDExists['country'];
        $_SESSION['city'] = $userIDExists['city'];
        $_SESSION['address'] = $userIDExists['address'];
        $_SESSION['postalcode'] = $userIDExists['postalcode'];

        $_SESSION['lastVisitedPage'] .= '?error=noneLogin';
        header('location: ' . $_SESSION['lastVisitedPage']);       
        exit();

        //}
        }
        else{
            header('Location: ../index.php?login=unsuccessfull');
            exit();
        }
    }
}

//Function to check if user exists in database
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../index.php');
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function sendEmail($emailFrom, $subject, $message)
{

    //Prepare and send email
    //change emails to correct
    $subject = "General message MAXON Car Auto Parts";
    $emailTo = 'maxon09987@gmail.com';
    $headers = 'From: ' . $emailFrom;
    $emailText = "You have received a new message from: $emailFrom \n\n\n $message";

    if (mail($emailTo, $subject, $emailText, $headers)) {
        header('Location: ../contactWithAccount.php?mail=sendagain');
        
    } else {
        header('Location: ../contactWithAccount.php?mail=notSend');
    }
}

function sendEmailPlainUser($emailFrom, $subject, $message)
{

    //Prepare and send email
    //change emails to correct
    $subject = "General message MAXON Car Auto Parts";
    $emailTo = 'maxon09987@gmail.com';
    $headers = 'From: ' . $emailFrom;
    $emailText = "You have received a new message from: $emailFrom \n\n\n $message";

    if (mail($emailTo, $subject, $emailText, $headers)) {
        header('Location: ../contact.php?mail=send');
        
    } else {
        header('Location: ../contact.php?mail=notSend');
    }
}

//Function to insert inquiry data in database
function addContactUsInquiry($conn, $name, $surname, $emailFrom, $phone, $subject, $message)
{

    $sql = 'INSERT INTO contactlist(name,surname,email,phone,subject,message,datesent) VALUES (?,?,?,?,?,?,NOW());';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../contactWithAccount.php?error=stmtFailed');
        exit();
    }
    

    mysqli_stmt_bind_param($stmt, "sssiss", $name, $surname, $emailFrom, $phone, $subject, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();
}