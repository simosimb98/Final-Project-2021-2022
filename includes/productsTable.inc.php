<?php

include_once 'capdb.inc.php';

$uid = $_SESSION['userID'];

$sql = "SELECT * FROM partsdetails WHERE userID = $uid;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        
      echo "<tr>
                 <td>".$row["productname"]."</td>
                 <td>".$row["year"]."</td>
                 <td>".$row["engine_size"]."</td>
                 <td>".$row["category"]."</td>
                 <td>".$row["car_brand"]."</td>
                 <td>".$row["car_model"]."</td>
                 <td>".$row["quantity"]."</td>
                 <td>€".$row["price"]."</td>
                 <td>€".$row["shippingcost"]."</td>
                 <td>
                 <a href='editProducts.php?carpartID=";
        echo $row["carpartID"]."&productname=";echo $row['productname']."&year=";;echo $row['year']."&engine_size=";echo $row['engine_size']."&category=";echo $row['category']."&car_brand=";echo $row['car_brand']."&car_model=";echo $row['car_model']."&quantity=";echo $row['quantity']."&price=";echo $row['price']."&shippingcost=";echo $row['shippingcost']."&description=";echo $row['description'];
        echo "&modal=editProducts' class='edit'><i class='material-icons' style='color:blue;' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                 <a href='?carpartID=";
        echo $row["carpartID"];
        echo "&modal=deleteProduct'><i class='material-icons' style='color:red; data-toggle='tooltip' title='Delete'>&#xe872;</i></a>   
                  </td>
                </tr> ";
        
        }
      }