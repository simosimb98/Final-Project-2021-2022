<?php
session_start();
//Check it is comming from a form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
	require_once 'capdb.inc.php';
    $email = mysqli_real_escape_string($conn,$_POST['email']);

	//set PHP variables like this so we can use them anywhere in code below
	$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);


	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['lastVisitedPage'] .= '?error=invalidNewsletterEmail';
		header('location: ' . $_SESSION['lastVisitedPage']);
		exit();
	}

	$sql = 'INSERT INTO newsletter(email) VALUES (?);';
	if(!$stmt = mysqli_stmt_init($conn)){
		$_SESSION['lastVisitedPage'] .= '?error=stmtFailed';
		header('location: ' . $_SESSION['lastVisitedPage']);
		exit();
	}
	if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['lastVisitedPage'] .= '?error=stmtFailed';
        header('location: ' . $_SESSION['lastVisitedPage']);
    }
	

	mysqli_stmt_bind_param($stmt,"s",$email);

	if(!mysqli_stmt_execute($stmt)){
		$_SESSION['lastVisitedPage'] .= '?newsletter=fail';
		header('location: ' . $_SESSION['lastVisitedPage']);
		exit();
	}else{
		$_SESSION['lastVisitedPage'] .= '?newsletter=success';
		header('location: ' . $_SESSION['lastVisitedPage']);
		exit();
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}else{
	header("Location:../index.php");
	exit();
}