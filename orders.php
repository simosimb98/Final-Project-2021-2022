<?php
include_once "includes/header.inc.php"; 
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function(){
    $('#contentable').DataTable();
});
</script>

    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Customers Orders</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>Customers Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="wishlist-area ptb-100">
        <div class="container">
        <div class="text-center" style="margin-bottom: 50px;"> 
                    <h2>New Customers Orders</h2>
                </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            <table id = "contentable" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                       <th scope="col">Status</th>
                                        <th scope="col">Order Details</th>
                                        <th scope="col">Total price(+shipping)</th>
                                        <th scope="col">Date of purchase</th>
                                        <th scope="col">Time of purchase</th>
                                        <th scope="col">Buyer Details</th>
                                    </tr>
                                </thead>
                           <?php
                        include_once 'includes/capdb.inc.php';
                        $uID = $_SESSION['userID'];
                       $sql = "SELECT *, SUM(orderprice) AS odr
                               FROM orders AS a
                               INNER JOIN orders_products AS b ON a.orderID = b.orderID
                               INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
                               INNER JOIN users AS d ON a.userID = d.userID
                               WHERE c.userID = $uID GROUP BY b.orderID";

                                $result = mysqli_query($conn, $sql);    

                            while($row = mysqli_fetch_assoc($result)){

                                 ?>  
                         <tbody>
                         <tr class="top-class">
                             <?php
                             if($row['orderstatus'] == 0){
                                 
                             ?>
                         <td class="product-name">
                             <form action="includes/orderStatus.inc.php?orderID=<?php echo $row['orderID']?>&name=<?php echo $row['name'];?>&surname=<?php echo $row['surname']?>&email=<?php echo $row['email'];?>&orderprice=<?php echo $row['odr'];?>" method="POST">
                                <button class="btn btn-outline-danger" name="orderStatus" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                Post
                                </button>
                            </form>
                            </td>
                            <?php
                             }else{
                            ?>
                            <td class="product-name">
                               <span class="unit-amount">Delivered</span>
                            </td>
                            <?php
                             }
                            ?>
                            <td>
                            <!-- -->
                            <div class='table-wrapper'>
                 <table class='table table-bordered' id='dataTable' width='50%' cellspacing='0'>
                 <thead>
                   <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $orderID = $row['orderID'];
                    $orderquery = "SELECT productname, price, orderquantity
                                    FROM orders AS a
                                    INNER JOIN orders_products AS b ON a.orderID = b.orderID
                                    INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
                                    WHERE b.orderID = $orderID;";
                                    
                    $resultorder = mysqli_query($conn, $orderquery);

                foreach($resultorder as $rowOrder){
                 echo "
                  <tr>
                        <td>".$rowOrder['productname']."</td>
                        <td>€".$rowOrder["price"]."</td>
                        <td>".$rowOrder["orderquantity"]."</td>
                        </tr>
                        ";
                    }
                  echo  "
                  </tbody>
                    </table>
                    </div>

                            <!-- -->
                            </td>";
                            ?>
                            <td class="product-price">
                                <span class="unit-amount">€<?php echo $row['odr'];?></span>
                            </td>     
                            <td class="product-price">
                                <span class="unit-amount"><?php echo $row['purchaseDate'];?></span>
                            </td>      
                            <td class="product-price">
                                <span class="unit-amount"><?php echo $row['time'];?></span>
                            </td>        
                            <td class="product-price">
                            <div class="box-cust">
                                <div style="line-height: 1.2;">
                                  <p style="font-size: smaller; position: absolute;">Name: <?php echo $row['name'];?> <?php echo $row['surname'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">Email: <?php echo $row['email'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">Phone No: <?php echo $row['phone'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">Postal Code: <?php echo $row['postalcode'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">Country: <?php echo $row['country'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">City: <?php echo $row['city'];?></p><br>
                                  <p style="font-size: smaller; position:absolute;">Address: <?php echo $row['address'];?></p><br>
                               </div>
                            </div>
                            </td>         
                       </tbody>
                        </tr>
                       <?php
                            }
                        ?>
                            </table>
                        </div>
                </div>  
            </div>
    </section>

    <style>
    .box-cust {
        width: 290px;
        height: 150px;  
        padding: 5px;
        border: 1px solid black;
        }
    </style>
 
<?php
include_once "includes/footer.inc.php";
?>