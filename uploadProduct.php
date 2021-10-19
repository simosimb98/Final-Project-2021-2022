<?php
include_once "includes/header.inc.php";
?>


<!--
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
-->

<div class="col-lg-12 col-md-12">
                    <div class="register-form" style="display: block;">
                        <h2>Product Details</h2>
                        <body>
                        <form action = "includes/getProducDetails.inc.php" method="POST" data-parsley-validate="">
                        <div id="rectangle1"></div>
                            <div class="form-group">
                                <label>Car brand</label>
                                <select name = "carbrand" id = "carbrand">
                                <option value="" selected="selected">Please select a car brand</option>
                                </select>
                                <br><br>
                            </div>

                            <div id="rectangle2"></div>
                            <div class="form-group">
                            <label>Car model</label>
                                <select name = "carmodel" id = "carmodel">
                                    <option value="" selected="selected">Please select a car brand first</option>
                                </select>
                                <br>
                            </div>

                            <div id="rectangle3"></div>
                            <div class="form-group">
                            <label>Year</label>
                                <select name = "year" id = "year">
                                    <option value="" selected="selected">Please select a car model first</option>
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
                                <label>Category</label>
                                <select name = "category" id = "category" required="">
                                <option value="oilsandfluids">Oils and fluids</option>
                                <option value="brakesystem">Brake System</option>
                                <option value="filters">Filters</option>
                                <option value="engine">Engine</option>
                                <option value="windscreencleaningsystem">Windscreen cleaning system</option>
                                <option value="Ingnition and Glowplug System">Brake System</option>
                                <option value="suspensionandarms">Suspension and Arms</option>
                                <option value="electrics">Electrics</option>
                                <option value="damping">Damping</option>
                                <option value="beltschainsrollers">Belts, Chains, Rollers</option>
                                <option value="body">Body</option>
                                <option value="heater">Heater</option>
                                <option value="gasketsandsealingrings">Gaskets and Sealing Rings</option>
                                <option value="exhaustsystem">Exhaust System</option>
                                <option value="interiorandcomfort">Interior and Comfort</option>
                                <option value="fuelsupplysystem">Fuel Supply System</option>
                                <option value="steering">Steering</option>
                                <option value="clutchparts">Clutch/Parts</option>
                                <option value="transmission">Transmission</option>
                                <option value="airconditioning">Air Conditioning</option>
                                <option value="bearings">Bearings</option>
                                <option value="propshaftanddifferentials">Propshafts and Differentials</option>
                                <option value="towbarparts">Towbar/Parts</option>
                                <option value="sensorrelayscus">Towbar/Parts</option>
                                <option value="sensorrelayscus">Sensors, Relays, Control units</option>
                                <option value="repairkits">Repair Kits</option>
                                <option value="pipesandhoses">Pipes and Hoses</option>
                                <option value="accessories">Accessories</option>
                                </select>
                                <br>
                            </div>
                            
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" data-parsley-required-message="Please enter the product's name" name = "productname" class="form-control" placeholder="Product name" data-parsley-length="[4, 25]" required="">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" data-parsley-required-message="Please enter the ammount of products available" name = "quantity" class="form-control" placeholder="Quantity" data-parsley-length="[1, 10]" required="">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" data-parsley-required-message="Please enter the price of the product" name = "price" class="form-control" placeholder="Price" data-parsley-length="[1, 10000]" required="">
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
                        <script type = "text/javascript" src = "assets/js/carSelection.inc.js"></script>

                        </body>
                </div>
            </div>

<?php
 include_once "includes/footer.inc.php";