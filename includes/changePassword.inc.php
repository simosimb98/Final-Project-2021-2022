<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'capdb.inc.php';
    
    $userID = (int)$_SESSION['userID'];

    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $repeatNewPassword = $_POST['repeatNewPassword'];

    //Error handlers
    if ($_POST['currentPassword'] != '') {
        //check if current passoword matches the one in the database


        $sql = "SELECT password FROM users WHERE userID = ?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../editProfile.php?error=stmtFailed');
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            if (password_verify($currentPassword, $row['password']) == false) {
                header('location: ../editProfile.php?error=currentPasswordWrong');
                exit();
            }
        } else {
            header('location: ../editProfile.php?error=somethingWrong');
        }



        //check if new password and repeat new password are the same
        if ($newPassword != $repeatNewPassword) {
            header('location: ../editProfile.php?error=passwordsDontMatch ');
            exit();
        } else {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password=? WHERE userID=?;";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('location: ../editProfile.php?error=stmtFailed');
                exit();
            }
            mysqli_stmt_bind_param($stmt, "si", $hashedNewPassword, $userID);
            if(!mysqli_stmt_execute($stmt)){
                header('location: ../editProfile.php?error=stmtFailed');

            }else{
                header('Location: ../editProfile.php?updatePassword=successful');
                exit();
            }
            
        }
        mysqli_stmt_close($stmt);
    }
}