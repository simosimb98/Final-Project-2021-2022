<?php
include_once "includes/header.inc.php";
?>

<script type = "text/javascript" src = "assets/js/carSelection.inc.js"></script>

<style>
    #rectangle1{
    width:210px;
    height:40px;
    background:#f9f7fc;
    top: 372px;
    bottom: 450px;
    position: absolute;
    z-index : 1;
}

#rectangle2{
    width:240px;
    height:40px;
    background:#f9f7fc;
    top: 474px;
    bottom: 450px;
    position: absolute;
    z-index : 1;
}

#rectangle3{
    width:250px;
    height:46px;
    background:#f9f7fc;
    top: 576px;
    bottom: 450px;
    position: absolute;
    z-index : 1;
}
</style>

<div class="col-lg-12 col-md-12">
                    <div class="register-form">
                        <h2>Product Details</h2>
                        <body>
                        <form action = "includes/getProducDetails.inc.php" method="POST" data-parsley-validate="">
                        <div id="rectangle1"></div>
                            <div class="form-group">
                                <label>Car brand</label>
                                <select name = "carbrand" id = "carbrand" required="">
                                <option value="" selected="selected" style = "display: none;">Please select a car brand</option>
                                </select>
                                <br>
                            </div>

                            <div id="rectangle2"></div>
                            <div class="form-group">
                            <label>Car model</label>
                                <select name = "carmodel" id = "carmodel">
                                    <option value="" selected="selected" style = "display: none;">Please select a car brand first</option>
                                </select>
                                <br>
                            </div>

                            <div id="rectangle3"></div>
                            <div class="form-group">
                            <label>Year</label>
                                <select name = "year" id = "year">
                                    <option value="" selected="selected" style = "display: none">Please select a car model first</option>
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
                                <label>Product name</label>
                                <input type="text" data-parsley-required-message="Please enter the product's name" name = "productname" class="form-control" placeholder="Product name" data-parsley-length="[4, 25]" required="">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" data-parsley-required-message="Please enter the ammount of products available" name = "quantity" class="form-control" placeholder="Quantity" data-parsley-length="[1, 3]" required="">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control rounded-0" name="description" id="description" rows="3" cols="100" style = "height: 150px;"
                                data-parsley-required-message="Please enter a description" data-parsley-length="[10, 1200]" placeholder = "Description" required=""></textarea>
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