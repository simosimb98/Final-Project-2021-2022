<?php

include_once 'capdb.inc.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['checkout'])){

        $uID = $_SESSION['userID'];

        $sql1 = "INSERT INTO orders (userID, purchaseDate) VALUES ($uID, NOW());";

        if(mysqli_query($conn, $sql1)){

            $orderID = mysqli_insert_id($conn);
            $sql2 = "INSERT INTO orders_products (orderID, carpartID, quantity, price) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conn, $sql2);

            if($stmt){

                mysqli_stmt_bind_param($stmt, "iiii", $orderID, $partID, $quantityCurrent, $total);
                foreach($_SESSION['cart'] as $keys => $values){

                    $partID = $values['part_id'];
                    $price = $values['part_price'];
                    $quantityCurrent = $values['part_quantity'];
                    $total = $quantityCurrent * $price;

                    $sql3 = "SELECT carpartID, quantity FROM partsdetails WHERE carpartID = $partID;";
                    $result = mysqli_query($conn, $sql3);
                    $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){

                        $modQuantity = $row['quantity'] - $quantityCurrent;

                        $sql4 = "UPDATE partsdetails SET quantity = $modQuantity WHERE carpartID = $partID;";
                        mysqli_query($conn, $sql4);                        
                    }
                }
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                unset($_SESSION['countcart']);
            }

            header('Location: ../cart.php?payment=successfull');
            exit();
            
        }
        else{
            header('Location: ../cart.php?payment=unsuccessfull');
            exit();
        }
    }

    if(isset($_POST['modQuantity']) && isset($_POST['part_name'])){

        foreach($_SESSION['cart'] as $keys => $values){
    
            if($values['part_name'] == $_POST['part_name']){
    
                $_SESSION['cart'][$keys]['part_quantity'] = $_POST['modQuantity'];

                echo "<script>
                window.history.back();
                </script>";
    
            }
        }
    
    }
}