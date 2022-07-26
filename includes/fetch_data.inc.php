<?php

include_once 'capdb.inc.php';
session_start();

if(isset($_POST['action']))
{
    $sql = "SELECT * FROM partsdetails
                            NATURAL JOIN carpartsmultimedia 
                            WHERE carpartID IS NOT NULL
                            ";
    
    if(isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])){

        $sql .= "
        AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' ";
    }

    if(isset($_POST['brand'])){

        $brand_filter = implode("','", $_POST['brand']);
        $sql.= "AND car_brand IN('".$brand_filter."') ";
    }
    if(isset($_POST['category'])){

        $category_filter = implode("','", $_POST['category']);
        $sql.= "AND category IN('".$category_filter."')";
    }

    $startfrom = $_POST['start_from'];
    $recordsperpage = $_POST['records_per_page'];

    $sql.=" GROUP BY productname LIMIT $startfrom, $recordsperpage";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $output='';

    if($resultCheck > 0){

        while($row = mysqli_fetch_assoc($result)){

           $output.='
            
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
                       <li>
                       <span style="color:#cc0000;" id = "prodprice" class="product-price">€' . $row['price'] . '</span>
                   </li>
                           <li>Brand: '.$row["car_brand"].'</li>
                           <li>Model: '.$row["car_model"].'</li>
                           <li>Year: '.$row["year"].'</li>
                           <li>Engine '.$row["engine_size"].'</li>
                           <li>Category: '.$row["category"].'</li>
                       </ul>
                   </div>
               </div>
           ';
    
    
    if(isset($_SESSION['userID'])){
        if($row['quantity'] == 0){
            $output.='
            <div class="col-lg-3 col-sm-3">
            <ul class="shop-btn-list">
                <li>
                    <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                    <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                </li>

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
            </ul>
        </div>
      </div>
    </div>
</div> 
</form>
            ';
          }else{
              $output.='
              <div class="col-lg-3 col-sm-3">
              <ul class="shop-btn-list">
                  <li>
                      <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                      <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                  </li>
                  
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
              </ul>
          </div>
        </div>
      </div>
  </div> 
  </form>
              ';
          } 
         }else{
            if($row['quantity'] == 0){
                $output.='
                <div class="col-lg-3 col-sm-3">
                <ul class="shop-btn-list">
                    <li>
                        <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                        <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                    </li>
    
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
                </ul>
            </div>
          </div>
        </div>
    </div> 
    </form>
                ';
              }else{
                  $output.='
                  <div class="col-lg-3 col-sm-3">
                  <ul class="shop-btn-list">
                      <li>
                          <input type = "hidden" name ="price_shop" class = "btn btn-outline-danger" value = "'.$row['price'].'"/>
                          <input type = "hidden" name ="shipping_shop" class = "btn btn-outline-danger" value = "'.$row['shippingcost'].'"/>
                      </li>
                      
                      <a href="shop.php?item=createAccount" class = "btn btn-outline-danger" style ="width: 152px; margin-left: 10px; margin-bottom: 15px;">Add to Cart 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                      <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                  </svg></a>
                      
                      <a href="shop.php?item=createAccount" class = "btn btn-outline-danger" style ="width: 155px; margin-left: 10px; margin-bottom: 15px;">Add to Wishlist 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                      <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                  </svg></a>
                  </ul>
              </div>
            </div>
          </div>
      </div> 
      </form>
                  ';
              }

         }
        }
    }
    else{
        $output = '<h3>No data found</h3>';
    }
    echo $output;

}
?>