<?php
include_once "includes/header.inc.php";
?>

<style>
    .list {
  max-height: 200px; 
  overflow-y: scroll !important;
}
</style>

<div class="col-lg-12 col-md-12">
                    <div class="register-form" style="display: block;">
                        <h2>Product Details</h2>
                        <body>
                        <form action = "includes/getProducDetails.inc.php" id = "form1" method="POST" data-parsley-validate="">
                            <div class="form-group">
                                <label>Car brand</label>
                                <select name = "carbrand" id = "carbrand">
                                <option value="" selected="selected">Please select a car brand</option>
                                </select>
                                <br><br>

                            <div class="form-group">
                            <label>Car model</label>
                                <select name = "carmodel" id = "carmodel">
                                    <option value="" selected="selected">Please select a car brand first</option>
                                </select>
                                <br>
                            </div>

                            <div class="form-group">
                            <label>Year</label>
                                <select  name = "year" id = "year">
                                    <option value="" selected="selected">Please select a car model first</option>
                                </select>
                                <br>
                            </div>

                            <div class="form-group">
                                <label>Engine Size</label>
                                <select name = "enginesize" id = "enginesize" required="">
                                <option value="1.2">1.2</option>
                                <option value="1.3">1.3</option>
                                <option value="1.3">1.5</option>
                                <option value="1.3">1.6</option>
                                <option value="1.3">1.8</option>
                                <option value="1.3">2.0</option>
                                <option value="1.3">2.5</option>
                                <option value="1.3">2.8</option>
                                <option value="1.3">3.0</option>
                                <option value="1.3">3.2</option>
                                <option value="1.3">3.3</option>
                                <option value="1.3">3.5</option>
                                <option value="1.3">3.7</option>
                                <option value="1.3">3.8</option>
                                <option value="1.3">3.9</option>
                                <option value="4.1">1.3</option>
                                </select>
                                <br>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name = "category" id = "category" required="">
                                <option value="Oils and Fluids">Oils and fluids</option>
                                <option value="Brake System">Brake System</option>
                                <option value="Filters">Filters</option>
                                <option value="Engine">Engine</option>
                                <option value="Windscreen cleaning system">Windscreen cleaning system</option>
                                <option value="Ingnition and Glowplug System">Ingnition and Glowplug System</option>
                                <option value="Suspension and arms">Suspension and Arms</option>
                                <option value="Electrics">Electrics</option>
                                <option value="Damping">Damping</option>
                                <option value="Belts chains rollers">Belts, Chains, Rollers</option>
                                <option value="Body">Body</option>
                                <option value="Heater">Heater</option>
                                <option value="Gaskets and sealing rings">Gaskets and Sealing Rings</option>
                                <option value="Exhaust system">Exhaust System</option>
                                <option value="Interior and Comfort">Interior and Comfort</option>
                                <option value="Fuel supply system">Fuel Supply System</option>
                                <option value="Steering">Steering</option>
                                <option value="Clutch parts">Clutch/Parts</option>
                                <option value="Transmission">Transmission</option>
                                <option value="Air Conditioning">Air Conditioning</option>
                                <option value="Bearings">Bearings</option>
                                <option value="Propshafts and Differentials">Propshafts and Differentials</option>
                                <option value="Towbar parts">Towbar/Parts</option>
                                <option value="Sensors Relays Control Units">Sensors, Relays, Control units</option>
                                <option value="Repair kits">Repair Kits</option>
                                <option value="Pipes and Hoses">Pipes and Hoses</option>
                                <option value="Accessories">Accessories</option>
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
                                <input type="text" data-parsley-required-message="Please enter the price of the product" name = "price" class="form-control" placeholder="eg: 10.5 or 10.00" data-parsley-pattern="^\d+(.\d+)?$" required="">
                            </div>
                            <div class="form-group">
                                <label>Shipping cost</label>
                                <input type="text" data-parsley-required-message="Please enter a shipping cost" name = "shipping" class="form-control" placeholder="eg: 10.5 or 10.00" data-parsley-pattern="^\d+(.\d+)?$" required="">
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