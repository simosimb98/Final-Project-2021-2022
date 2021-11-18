<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'capdb.inc.php';
    $userID = (int)$_SESSION['userID'];
    $firstname = $_POST['name'];
    $lastname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];

    //Update field in database
    $sql = "UPDATE users SET name = ? ,surname = ?, phone = ?, email = ?, country = ?, city = ?, address = ?, postalcode = ? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../editProfile.php?error=stmtFailed');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssissssii", $firstname, $lastname, $phone, $email, $country, $city, $address, $postalcode, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location: ../editProfile.php?stmtFailed');
        exit();
    } else {
        $_SESSION['name'] = $firstname;
        $_SESSION['surname'] = $lastname;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['country'] = $country;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        $_SESSION['postalcode'] = $postalcode;

        header('Location: ../editProfile.php?updateDetails=successfull');
        exit();
    }
}