<?php
include_once "includes/header.inc.php"; 
?>

</script>

    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Cart</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">SubTotal</th>
                                    </tr>
                                </thead>
                           <?php

                            if(!empty($_SESSION['cart'])){

                               foreach($_SESSION['cart'] as $keys => $values){
                            
                                 ?>  
                        <form action="includes/purchase.inc.php" method="POST">
                         <tbody>
                             <tr class="top-class">
                                        <td class="product-thumbnail">
                                            <a href="includes/removeFromCart.inc.php?action=delete&id=<?php echo $values['part_id'];?>" class="remove"><i class="bx bx-x"></i></a>
                                            <input type = "hidden" name ="partID" class = "btn btn-outline-danger" value = "<?php echo $values['part_id'];?>">
                                            <a href="products-details.php?id=<?php echo $values['part_id']; ?>">
                                               <img src= <?php echo $values['part_photo'];?> alt="item">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="products-details.php?id=<?php echo $values['part_id']; ?>"><?php echo $values['part_name'];?></a>
                                        </td>
                                        <td class="product-price">
                                            <span class="unit-amount">€<?php echo $values['part_price'];?></span>
                                            <br>
                                            <span style="font-size:smaller; font:small-caps">+ €<?php echo $values['part_shipping'];?></span>
                                            <input type ="hidden" class="iprice" value="<?php echo $values['part_price']?>" />
                                            <input type ="hidden" class="ishipping" value="<?php echo $values['part_shipping'];?>" />
                                        </td>
                                   </form>
                                        <td class="product-quantity">
                                            <div class="input-counter" > 
                                            <form action="includes/addToCart.inc.php" method ="POST"> 
                                                <input type="number" onchange = "this.form.submit();" class = "iquantity" name ="modQuantity" value="<?php echo $values['part_quantity']?>" min="1" max="10">
                                                <input type = "hidden" name ="part_id" class = "btn btn-outline-danger" value = "<?php echo $values['part_id'];?>"/>
                                              </form>
                                            </div>
                    
                                        </td>
                                       <td class="product-subtotal">
                                       €<span class="subtotal-amount itotal"></span>
                                        </td>
                                      
                                    </tr>                         
  
                       </tbody>
                       <?php
                                }
                            }
                        ?>
                            </table>
                        </div>
                </div>
                   <?php
                   // $total = $total +($values['part_quantity'] * $values['part_price']);
                if(isset($_SESSION['countcart']) && $_SESSION['countcart'] != 0){
                    ?>
                <div class="col-lg-4 col-md-12">
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <ul>
                        <li>Cart Items: <?php echo $_SESSION['countcart'];?></li>
                        <li>Payable Total (+shipping):</li><li>€<span id ="gtotal"></span></li>
                        </ul>
                        <form action="includes/purchase.inc.php" method="POST">
                        <button type = "submit" name = "checkout" class="default-btn">
                            Proceed to Checkout
                    </button>
                        </form>
                    </div>
                </div>
                </form>
                <?php
                }else{
                    echo '   <div class="col-lg-4 col-md-12">
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <ul>
                            <li>Shipping <span>€0</span></li>
                            <li>Total <span>€0</span></li>
                            <li>Payable Total <span>€0</span></li>
                        </ul>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </section>
 
   <?php
include_once "includes/footer.inc.php";
?>

<script>

    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var ishipping = document.getElementsByClassName('ishipping');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');


    function subTotal(){
        gt = 0;
        for(i=0; i<iprice.length; i++){


            itotal[i].innerText = Number.parseFloat(((iprice[i].value) * (iquantity[i].value)) + Number.parseFloat(ishipping[i].value)).toFixed(2);
            
            gt = (gt + (iprice[i].value) * (iquantity[i].value) + Number.parseFloat(ishipping[i].value));

        }

        gtotal.innerText= Number.parseFloat(gt).toFixed(2);


    }
    subTotal();
</script>




