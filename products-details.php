<?php
include_once "includes/header.inc.php";
require_once 'includes/capdb.inc.php';
$partID = $_GET['id'];

?>
<script>
    $(document).ready(function () {
        $('.carousel-item').first().addClass('active')});
</script>
<style>
    .carousel-control-next,
.carousel-control-prev /*, .carousel-indicators */ {
    filter: invert(100%);
}
</style>
    <div class="page-banner-area item-bg3">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Products Details</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>Products Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="products-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="products-details-desc">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6">
                                <div class="main-products-image">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                     <?php
                                        $sql1 = "SELECT * FROM carpartsmultimedia WHERE carpartID = $partID;";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $resultCheck1 = mysqli_num_rows($result1);

                                        while($row1 = mysqli_fetch_assoc($result1)){
                                        ?>
                                        <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo $row1['photo']; ?>">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>     
                                </div>
                            </div>
                            <?php
                                //$sql = "SELECT * FROM partsdetails WHERE carpartID = $partID;";
                               $sql = "SELECT * FROM partsdetails pd
                                        INNER JOIN carpartsmultimedia pc
                                        ON pd.carpartID = pc.carpartID
                                        WHERE pd.carpartID = $partID LIMIT 1;";

                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                
                                while($row = mysqli_fetch_assoc($result)){

                            ?>
                            <div class="col-lg-5 col-md-6">
                                <div class="product-content">
                                    <h3><?php echo $row['productname'];?></h3>
                                    <div class="product-review">
                                      <!--  <div class="rating">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                        </div>-->
                                    </div>
                                    <div class="price">
                                       <!-- <span class="old-price">$150.00</span> -->
                                        <span class="new-price">Price: €<?php echo $row['price'];?></span>
                                    </div>
                                    <ul class="products-info">
                                    <li><span>Shipping: </span>€<?php echo $row['shippingcost'];?></li>
                                        <?php
                                        if($row['quantity'] != 0){
                                        ?>
                                        <li style = "color: blue;"><span>Availability:</span> IN STOCK</li>
                                        <?php
                                        }else{
                                        ?>
                                        <li style = "color: red;"><span>Availability:</span> OUT OF STOCK</li>
                                        <?php
                                        }
                                        ?>
                                        <li><span>Category: </span><?php echo $row['category'];?></li>
                                        <li><span>Car Brand: </span><?php echo $row['car_brand'];?></li>
                                        <li><span>Car Model: </span><?php echo $row['car_model'];?></li>
                                        <li><span>Engine Size: </span><?php echo $row['engine_size'];?></li>
                                        <li><span>Engine Size: </span><?php echo $row['year'];?></li>
                                    </ul>
                                    <div class="product-quantities">
                                        <span>Stock Left: <?php echo $row['quantity']?></span>
                                    </div>
                                    <div class="product-add-to-cart">
                                  <form action = "includes/addToCart.inc.php?action=add&id=<?php echo $row['carpartID']; ?>&quantity=<?php echo $row['quantity'];?>" method="POST">
                                  <input type = "hidden" name ="prname_shop" class = "btn btn-outline-danger" value ="<?php echo $row['productname'];?>" />
                                  <input type = "hidden" name ="photo_shop" class = "btn btn-outline-danger" value ="<?php echo $row['photo'];?>" />
                                  <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value ="<?php echo $row['price'];?>" />
                                  <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value ="<?php echo $row['shippingcost'];?>" />

                                  <?php
                                  if($row['quantity'] == 0){
                                  ?>
                                    <a href="shop.php?item=outoFstock" class = "btn btn-outline-danger" style ="width: 200px;">Add to Cart 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg></a>

                                    <button type = "submit" name ="addToWaittingList" class = "btn btn-outline-danger" style="width: 200px;">Get notified!
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                        </svg>
                                       </button>
                                    <?php
                                  }else{
                                    ?>
                                    <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 200px;">Add to Cart
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                       </button>
                                       <?php
                                          }
                                       ?>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="products-details-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description">Description</a></li>
                           <!-- <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews</a></li> -->
                            <li class="nav-item"><a class="nav-link" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-controls="information">Shipping Information</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <h2>Overview</h2>
                                <p><?php echo $row['description']; ?></p>
                            </div>
                            <?php
                            /*$sql3 = mysqli_query($conn,"SELECT userID FROM partsdetails WHERE carpartID = $partID;");
                            $row3 = mysqli_fetch_assoc($sql3);*/

                            $sql4 = "SELECT country,city,phone,email,shop FROM users
                                     NATURAL JOIN shops
                                     WHERE users.userID = ".$row['userID'].";";
                            $result4 = mysqli_query($conn, $sql4);

                            while($row4 = mysqli_fetch_assoc($result4)){
                            ?>
                            <div class="tab-pane fade show" id="information" role="tabpanel">
                                <ul class="information-list">
                                    <li>Shop: <span><?php echo $row4['shop']; ?></span></li>
                                    <li>Shipping From: <span><?php echo $row4['country'];?>, <?php echo $row4['city'];?></span></li>
                                    <li>Phone: <span><?php echo $row4['phone'];?></span></li>
                                    <li>Email: <span><?php echo $row4['email'];?></span></li>
                                </ul>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>


<?php
include_once "includes/footer.inc.php";
?>