<?php

session_start();

unset($_SESSION['userID']);
unset($_SESSION['name']);
unset($_SESSION['surname'] );
unset($_SESSION['phone'] );
unset($_SESSION['email'] );
unset($_SESSION['role'] );
unset($_SESSION['country'] );
unset($_SESSION['city'] );
unset($_SESSION['address'] );
unset($_SESSION['postalcode'] );

header('Location: ../index.php');
exit();