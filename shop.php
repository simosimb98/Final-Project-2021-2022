<?php
include_once "includes/header.inc.php";
include_once 'includes/capdb.inc.php';

$records_per_page = 4;
$page = '';
if(isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}

$start_from = ($page - 1) * $records_per_page;
?>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-option d-flex align-items-center">
                            <div class="option-item">
                                <span>
                                    Hotline:
                                    <a href="tel:882563789966">(+882) 563 789 966</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-banner-area item-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Shop</h2>
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="shop-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <form action="" method="GET">

                    <h5 class="text-center">Filter Products        
                        <button type="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            Search</button>
                    </h5>
                    <hr>

                    <div class="shop-sidebar">
                        <div class="brand-sidebar-item">
                            <h3>Brand</h3>
                            <ul class="brand-input-checkbox" style="height: 250px; overflow-y: scroll;">
                            <?php

                                $sqlBrands= "SELECT carpartID,car_brand FROM partsdetails ORDER BY car_brand;";
                                $resultBrands =  mysqli_query($conn,$sqlBrands);

                                while($rowBrands = mysqli_fetch_assoc($resultBrands)){

                                    $checked = [];
                                    if(isset($_GET['brands'])){
                                        $checked = $_GET['brands'];
                                    }
                                ?>
                                <li class="checkbox">
                                    <input type="checkbox" name="brands[]" class="input" value="<?php echo $rowBrands['carpartID'];?>"
                                    <?php
                                    if(in_array($rowBrands['carpartID'],$checked)){
                                        echo "checked";
                                    }
                                    ?>
                                    />
                                    <label class="label"><?php echo $rowBrands['car_brand'];?></label>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>

                        <div class="discount-sidebar-item">
                            <h3>Category</h3>
                            <ul class="discount-input-checkbox" style="height: 600px; overflow-y: scroll;">
                            <?php

                                $sqlCategory= "SELECT carpartID,category FROM partsdetails ORDER BY category;";
                                $resultCategory =  mysqli_query($conn,$sqlCategory);

                                while($rowCategory = mysqli_fetch_assoc($resultCategory)){
                                    $checked1 =[];
                                    if(isset($_GET['category'])){
                                        $checked1 = $_GET['category'];
                                    }
                                ?>
                                <li class="checkbox">
                                    <input type="checkbox" name="category[]" value ="<?php echo $rowCategory['carpartID'];?>" class="input"
                                    <?php
                                    if(in_array($rowCategory['carpartID'],$checked1)){
                                        echo "checked";
                                    }
                                    ?>
                                    />
                                    <label class="label"><?php echo $rowCategory['category'];?></label>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>

                    </form>
                </div>
                <div class="col-lg-9 col-md-12">
                    <?php
                    if(isset($_GET['brands']) && !isset($_GET['category'])){
                        $brandsChecked = [];
                        $brandsChecked = $_GET['brands'];

                        foreach($brandsChecked as $rowBrand){

                            $sql = "SELECT * FROM partsdetails pd
                            INNER JOIN carpartsmultimedia pc
                            ON pd.carpartID = pc.carpartID
                            WHERE pd.carpartID IN ($rowBrand)
                            GROUP BY pd.carpartID LIMIT $start_from, $records_per_page;";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <form action = "includes/addToCart.inc.php?action=add&id='.$row['carpartID'].'&quantity='.$row['quantity'].'" method = "POST">
                         <div class="shop-item-box">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-3">
                                <div class="shop-image">
                                    <a href="products-details.php?id='.$row['carpartID'].'">
                                        <img id = "img" src="'.$row['photo'].'" alt="image">
                                        <input type = "hidden" name ="photo_shop" class = "btn btn-outline-danger" value = "'.$row['photo'].'"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="shop-content">
                                    <h3>
                                        <a name = "prodname" href="products-details.php?id='.$row['carpartID'].'">'.$row["productname"].'</a>
                                        <input type = "hidden" name ="prname_shop" class = "btn btn-outline-danger" value ="'.$row['productname'].'" />

                                    </h3>
            
                                    <ul class="shop-list">
                                        <li>Brand: '.$row["car_brand"].'</li>
                                        <li>Model: '.$row["car_model"].'</li>
                                        <li>Year: '.$row["year"].'</li>
                                        <li>Engine '.$row["engine_size"].'</li>
                                        <li>Category: '.$row["category"].'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <ul class="shop-btn-list">
                                    <li>
                                        <span id = "prodprice" class="product-price">€' . $row['price'] . '</span>
                                        <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                                        <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                                    </li>';
                                    ?>

                                  <?php
                                    if($row['quantity'] == 0){
                                        echo'
                                        <a href="shop.php?item=outoFstock" class = "btn btn-outline-danger" style ="width: 152px; margin-left: 10px; margin-bottom: 15px;">Add to Cart 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg></a>
                                        
                                    
                                    </li>
                                    <li>
                                    <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </button>
                                       </li>
                                        ';
                                    }else{
                                        echo '
                                        <li>
                                        <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                       </button>
                                        
                                        </li>
                                        <li>
                                        <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        </button>
                                           </li>
                                        ';
                                    }
                                    ?>
                                 
                                </ul>
                            </div>
                        </div>
                    </div> 
                    </form>
                    <?php
                    } 
                        }

                    }else if(isset($_GET['category']) && !isset($_GET['brands'])){
                        $categChecked = [];
                        $categChecked = $_GET['category'];

                        foreach($categChecked as $rowCat){

                            $sql = "SELECT * FROM partsdetails pd
                            INNER JOIN carpartsmultimedia pc
                            ON pd.carpartID = pc.carpartID
                            WHERE pd.carpartID IN ($rowCat)
                            GROUP BY pd.carpartID LIMIT $start_from, $records_per_page;";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <form action = "includes/addToCart.inc.php?action=add&id='.$row['carpartID'].'&quantity='.$row['quantity'].'" method = "POST">
                         <div class="shop-item-box">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-3">
                                <div class="shop-image">
                                    <a href="products-details.php?id='.$row['carpartID'].'">
                                        <img id = "img" src="'.$row['photo'].'" alt="image">
                                        <input type = "hidden" name ="photo_shop" class = "btn btn-outline-danger" value = "'.$row['photo'].'"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="shop-content">
                                    <h3>
                                        <a name = "prodname" href="products-details.php?id='.$row['carpartID'].'">'.$row["productname"].'</a>
                                        <input type = "hidden" name ="prname_shop" class = "btn btn-outline-danger" value ="'.$row['productname'].'" />

                                    </h3>
            
                                    <ul class="shop-list">
                                        <li>Brand: '.$row["car_brand"].'</li>
                                        <li>Model: '.$row["car_model"].'</li>
                                        <li>Year: '.$row["year"].'</li>
                                        <li>Engine '.$row["engine_size"].'</li>
                                        <li>Category: '.$row["category"].'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <ul class="shop-btn-list">
                                    <li>
                                        <span id = "prodprice" class="product-price">€' . $row['price'] . '</span>
                                        <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                                        <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                                    </li>';
                                    ?>

                                  <?php
                                    if($row['quantity'] == 0){
                                        echo'
                                        <a href="shop.php?item=outoFstock" class = "btn btn-outline-danger" style ="width: 152px; margin-left: 10px; margin-bottom: 15px;">Add to Cart 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg></a>
                                        
                                    
                                    </li>
                                    <li>
                                    <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </button>
                                       </li>
                                        ';
                                    }else{
                                        echo '
                                        <li>
                                        <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                       </button>
                                        
                                        </li>
                                        <li>
                                        <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        </button>
                                           </li>
                                        ';
                                    }
                                    ?>
                                 
                                </ul>
                            </div>
                        </div>
                    </div> 
                    </form>
                    <?php
                    } 
                        }

                    }else if(isset($_GET['brands']) && isset($_GET['category'])){
                        $bothChecked = [];
                        $bothChecked = array_merge($_GET['brands'], $_GET['category']);

                        foreach($bothChecked as $rowBoth){

                            $sql = "SELECT * FROM partsdetails pd
                            INNER JOIN carpartsmultimedia pc
                            ON pd.carpartID = pc.carpartID
                            WHERE pd.carpartID IN ($rowBoth)
                            GROUP BY pd.carpartID LIMIT $start_from, $records_per_page;";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <form action = "includes/addToCart.inc.php?action=add&id='.$row['carpartID'].'&quantity='.$row['quantity'].'" method = "POST">
                         <div class="shop-item-box">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-3">
                                <div class="shop-image">
                                    <a href="products-details.php?id='.$row['carpartID'].'">
                                        <img id = "img" src="'.$row['photo'].'" alt="image">
                                        <input type = "hidden" name ="photo_shop" class = "btn btn-outline-danger" value = "'.$row['photo'].'"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="shop-content">
                                    <h3>
                                        <a name = "prodname" href="products-details.php?id='.$row['carpartID'].'">'.$row["productname"].'</a>
                                        <input type = "hidden" name ="prname_shop" class = "btn btn-outline-danger" value ="'.$row['productname'].'" />

                                    </h3>
            
                                    <ul class="shop-list">
                                        <li>Brand: '.$row["car_brand"].'</li>
                                        <li>Model: '.$row["car_model"].'</li>
                                        <li>Year: '.$row["year"].'</li>
                                        <li>Engine '.$row["engine_size"].'</li>
                                        <li>Category: '.$row["category"].'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <ul class="shop-btn-list">
                                    <li>
                                        <span id = "prodprice" class="product-price">€' . $row['price'] . '</span>
                                        <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                                        <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                                    </li>';
                                    ?>

                                  <?php
                                    if($row['quantity'] == 0){
                                        echo'
                                        <a href="shop.php?item=outoFstock" class = "btn btn-outline-danger" style ="width: 152px; margin-left: 10px; margin-bottom: 15px;">Add to Cart 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg></a>
                                        
                                    
                                    </li>
                                    <li>
                                    <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </button>
                                       </li>
                                        ';
                                    }else{
                                        echo '
                                        <li>
                                        <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                       </button>
                                        
                                        </li>
                                        <li>
                                        <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        </button>
                                           </li>
                                        ';
                                    }
                                    ?>
                                 
                                </ul>
                            </div>
                        </div>
                    </div> 
                    </form>
                    <?php
                    } 
                        }

                    }else{
                    $sql = "SELECT * FROM partsdetails pd
                            INNER JOIN carpartsmultimedia pc
                            ON pd.carpartID = pc.carpartID
                            GROUP BY pd.carpartID LIMIT $start_from, $records_per_page;";

                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <form action = "includes/addToCart.inc.php?action=add&id='.$row['carpartID'].'&quantity='.$row['quantity'].'" method = "POST">
                         <div class="shop-item-box">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-sm-3">
                                <div class="shop-image">
                                    <a href="products-details.php?id='.$row['carpartID'].'">
                                        <img id = "img" src="'.$row['photo'].'" alt="image">
                                        <input type = "hidden" name ="photo_shop" class = "btn btn-outline-danger" value = "'.$row['photo'].'"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="shop-content">
                                    <h3>
                                        <a name = "prodname" href="products-details.php?id='.$row['carpartID'].'">'.$row["productname"].'</a>
                                        <input type = "hidden" name ="prname_shop" class = "btn btn-outline-danger" value ="'.$row['productname'].'" />

                                    </h3>
            
                                    <ul class="shop-list">
                                        <li>Brand: '.$row["car_brand"].'</li>
                                        <li>Model: '.$row["car_model"].'</li>
                                        <li>Year: '.$row["year"].'</li>
                                        <li>Engine '.$row["engine_size"].'</li>
                                        <li>Category: '.$row["category"].'</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <ul class="shop-btn-list">
                                    <li>
                                        <span id = "prodprice" class="product-price">€' . $row['price'] . '</span>
                                        <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                                        <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                                    </li>';
                                    ?>

                                  <?php
                                    if($row['quantity'] == 0){
                                        echo'
                                        <a href="shop.php?item=outoFstock" class = "btn btn-outline-danger" style ="width: 152px; margin-left: 10px; margin-bottom: 15px;">Add to Cart 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                    </svg></a>
                                        
                                    
                                    </li>
                                    <li>
                                    <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    </button>
                                       </li>
                                        ';
                                    }else{
                                        echo '
                                        <li>
                                        <button type = "submit" name ="addToCart" class = "btn btn-outline-danger" style="width: 152px;">Add to Cart
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                       </button>
                                        
                                        </li>
                                        <li>
                                        <button type = "submit" name ="addToWishlist" class = "btn btn-outline-danger">Add to Wishlist
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        </button>
                                           </li>
                                        ';
                                    }
                                    ?>
                                 
                                </ul>
                            </div>
                        </div>
                    </div> 
                    </form>
                    <?php
                    } 
                }
                    ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            <?php
                                $page_query = "SELECT * FROM partsdetails pd
                                                INNER JOIN carpartsmultimedia pc
                                                ON pd.carpartID = pc.carpartID
                                                GROUP BY pd.carpartID;";
                                
                                $page_result = mysqli_query($conn, $page_query);
                                $total_records = mysqli_num_rows($page_result);
                                $total_pages = ceil($total_records/$records_per_page);

                                if($page > 1){
                                    echo'  <a href="shop.php?page='.($page-1).'" class="prev page-numbers">
                                    <i class="bx bxs-chevron-left"></i>
                                </a>';
                                }

                                for($i = 1; $i <= $total_pages; $i++){

                                    if($i == $page){
                                    echo '<span class="page-numbers current" aria-current="page">'.$i.'</span>';
                                    }
                                    else{
                                    echo'
                                        <a href="shop.php?page='.$i.'" class="page-numbers">'.$i.'</a>';
                                     }
                                    }

                                    if($i > $page){
                                    echo' <a href="shop.php?page='.($page+1).'" class="next page-numbers">
                                        <i class="bx bxs-chevron-right"></i>
                                    </a>';
                                    }
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<script src="assets/js/main.inc.js"></script>-->

<?php
include_once "includes/footer.inc.php";
?>

  