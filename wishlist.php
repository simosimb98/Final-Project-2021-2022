<?php
include_once "includes/header.inc.php"; 
?>

    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Wishlist</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Wishlist</li>
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
                    <h2>My Wishlist</h2>
                </div>
            <div class="row">
                <div class="col-lg-13 col-md-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Remove</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                           <?php
                        include_once 'includes/capdb.inc.php';
                            if(!empty($_SESSION['wishlist'])){

                               foreach($_SESSION['wishlist'] as $keys => $values){

                                $partID = $values['part_id'];

                                $sql = "SELECT quantity FROM partsdetails WHERE carpartID = $partID;";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                    
                                 ?>  
                         <tbody>
                             <tr class="top-class">
                             <td class="product-remove">
                            <a href="includes/removeFromWishlist.inc.php?action=delete&id=<?php echo $values['part_id'];?>" class="remove"><i class="bx bx-x"></i>
                             </a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="#">
                                    <img src=<?php echo $values['part_photo'];?> alt="item" class="img-new">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="products-details.html"><?php echo $values['part_name'];?></a>
                            </td>
                            <td class="product-price">
                                <span class="unit-amount">€<?php echo $values['part_price'];?></span>
                            </td>
                            <?php
                            if($row['quantity'] != 0){
                            echo '<td class="product-stock">
                                <span class="stock">In Stock</span>
                            </td>
                            <form action="includes/cart.php" method="POST">
                            <td class="product-btn">
                            <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                            </td>
                            </form>';
                            }else{
                                echo '<td class="product-stock">
                                <span class="stock">Out of Stock</span>
                            </td>
                            <form>
                            <td class="product-btn">
                                <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            </td>
                            </form>';
                            }
                            ?>
                                      
                                    </tr>                         
  
                       </tbody>
                       <?php
                                }
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


