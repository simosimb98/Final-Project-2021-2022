<?php

if(isset($_POST['submitRegister'])){

    include_once 'capdb.inc.php';
    
    $first = mysqli_real_escape_string($conn,$_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    
	$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($conn));
	if (mysqli_num_rows($select)) {
        header('Location: ../register.php?error=emailExists');
		exit();
	}
     
    if($role == 4){
    $sql = "INSERT INTO users (name, surname, email, phone, password, role, status) VALUES (?,?,?,?,?,?,1);";
    }
    else{
        $sql = "INSERT INTO users (name, surname, email, phone, password, role, status) VALUES (?,?,?,?,?,?,0);";
    }


    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sssisi", $first, $last, $email, $phone, $hashedPwd, $role);
        mysqli_stmt_execute($stmt);
    }
        header('Location: ../userLocationDetails.php');
        exit();
}