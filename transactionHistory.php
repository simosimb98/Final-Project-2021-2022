<?php
include_once "includes/header.inc.php"; 
?>

    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Transaction History</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>Transaction History</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="wishlist-area ptb-100">
        <div class="container">
        <div class="wishlist-table table-responsive">
        <div class="wishlist-title">
                    <h2>My Purchase history</h2>
                </div>
            <div class="row">
                <div class="col-lg-13 col-md-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total price</th>
                                        <th scope="col">Date Purchased</th>
                                    </tr>
                                </thead>
                           <?php
                        include_once 'includes/capdb.inc.php';
                        $uID = $_SESSION['userID'];
                        
                       $sql = "SELECT *
                               FROM orders AS a
                               INNER JOIN orders_products AS b ON a.orderID = b.orderID
                               INNER JOIN partsdetails AS c ON c.carpartID = b.carpartID
                               WHERE a.userID = $uID;";

                                $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)){
                                 ?>  
                         <tbody>
                         <tr class="top-class">
                            <td class="product-name">
                                <a href="products-details.php?id=<?php echo $row['carpartID']; ?>"><?php echo $row['productname'];?></a>
                            </td>
                            <td class="product-price">
                                <span class="unit-amount">€<?php echo $row['price'];?></span>
                            </td>      
                            <td class="product-price">
                                <span class="unit-amount"><?php echo $row['orderquantity'];?></span>
                            </td>  
                            <td class="product-price">
                                <span class="unit-amount">€<?php echo $row['orderprice'];?></span>
                            </td>     
                            <td class="product-price">
                                <span class="unit-amount"><?php echo $row['purchaseDate'];?></span>
                            </td>             
                       </tbody>
                       <?php
                            }
                        ?>
                            </table>
                        </div>
                </div>  
            </div>
        </div>
    </section>
 
<?php
include_once "includes/footer.inc.php";
?>


