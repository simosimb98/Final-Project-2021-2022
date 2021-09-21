<?php
include_once "includes/header.inc.php";
?>

<script type = "text/javascript" src = "assets/js/carSelection.inc.js"></script>
<style type="text/css">
 .scrollable{
   overflow: auto;
   width: 150px; /* adjust this width depending to amount of text to display */
   height: 80px; /* adjust height depending on number of options to display */
   border: 1px;
 }
 .scrollable select{
   border: none;
 }
</style>

<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Product Details</h2>
                        <body>
                        <form action = "includes/getProducDetails.inc.php" method="POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>Car brand</label>
                                <div class = "scrollable">
                                <select name = "carbrand" id = "carbrand" onchange="random()" required="">
                                <option value ="audi">Audi</option>
                                <option value ="alpharome">Alpha Romeo</option>
                                <option value ="bmw">BMW</option>
                                <option value ="citroen">Citroen</option>
                                <option value ="chevrolet">Chevrolet</option>
                                <option value ="dacia">Dacia</option>
                                <option value ="datsun">Datsun</option>
                                <option value ="ford">Ford</option>
                                <option value ="fiat">Fiat</option>
                                <option value ="honda">Honda</option>
                                <option value ="hyundai">Hyundai</option>
                                <option value ="isuzu">Isuzu</option>
                                <option value ="jeep">Jeep</option>
                                <option value ="kia">KIA</option>
                                <option value ="landrover">Land Rover</option>
                                <option value ="lexus">Lexus</option>
                                <option value ="mitsubishi">Mitsubishi</option>
                                <option value ="mercedes">Mercedes</option>
                                <option value ="mazda">Mazda</option>
                                <option value ="mini">Mini</option>
                                <option value ="nissa">Nissan</option>
                                <option value ="opel">Opel</option>
                                <option value ="peugot">Peugot</option>
                                <option value ="renault">Renault</option>
                                <option value ="saab">Saab</option>
                                <option value ="seat">SEAT</option>
                                <option value ="subaru">Subaru</option>
                                <option value ="skoda">Skoda</option>                                
                                <option value ="smart">Smart</option>
                                <option value ="suzuki">Suzuki</option>
                                <option value ="toyota">Toyota</option>
                                <option value ="volvo">Volvo</option>
                                <option value ="vauxhall">Vauxhall</option>
                                <option value ="volkswagen">Volkswagen</option>
                                </select>
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                            <label>Car model</label>
                            </div>
                            <div class="form-group">
                                <select name = "carmodel">
                                <option></option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Engine Size</label>
                                <select name = "enginesize" id = "enginesize" required="">
                                <option value="1.2">1.2</option>
                                <option value="1.3">1.3</option>
                                </select>
                                <br>
                            </div>
                            
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" data-parsley-required-message="Please enter a year" name = "year" class="form-control" placeholder="Year" data-parsley-minlength="4" 
                                 data-parsley-maxlength="4" required="">
                            </div>
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" data-parsley-required-message="Please enter the product's name" name = "productname" class="form-control" placeholder="Product name" data-parsley-length="[4, 25]" required="">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" data-parsley-required-message="Please enter the ammount of products available" name = "quantity" class="form-control" placeholder="Quantity" data-parsley-length="[1, 3]" required="">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control rounded-0" name="description" id="description" rows="20" cols="100" style = "height: 150px;"
                                data-parsley-required-message="Please enter a description" data-parsley-length="[50, 1200]" placeholder = "Description" required=""></textarea>
                            </div>
        
                            <div class="form-group">
                            <button type="submit" value = "registerProductDetails" name = "registerProductDetails" style="margin-top: 20px;">Register Product</button>
                            </div>
                        </form>
                        </body>
                </div>
            </div>

<?php
 include_once "includes/footer.inc.php";