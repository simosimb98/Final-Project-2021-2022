<?php
session_start();
include_once "includes/capdb.inc.php";

function logInUser($conn, $email, $password)
{

    $userIDExists = emailExists($conn, $email);
    if ($userIDExists === false) {
        header('location: ../my-account.php?email=doesnotExist');
        exit();
    }

    $passwordHashed = $userIDExists['password'];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header('location: ../my-account.php?error=wrongPass');

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
