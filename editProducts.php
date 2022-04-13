<?php
include_once 'includes/header.inc.php';
?>
<head>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
</head>

  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="text-center" style="margin-bottom: 30px; margin-top: 20px;">Edit Products</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 style="font-size: larger;">My products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id = "example" class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Year</th>
                                            <th>Engine</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Shipping</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once 'includes/productsTable.inc.php';?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<!-- Delete Product -->
<div id="deleteProduct" class="modal fade" data-toggle="modal">
       <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/deleteProduct.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <p class="text-warning"><small>All product details will be deleted!</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="carpartID" value="<?php echo $_GET['carpartID'] ?>">
                        <button type="submit" value="Yes" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
       </div>
</div>
 <!-- Edit Modal HTML -->
          <div id="editProducts" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="includes/editProductDetails.inc.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    <style>
                        .list {
                    max-height: 200px; 
                    overflow-y: scroll !important;
                    }
                    </style>
                    <script type = "text/javascript" src = "assets/js/carSelection.inc.js"></script>
                  
                        <div class="form-group">
                        <div class="col-sm-6">
                        <label>Car brand</label>
                        </div>
                                <select name = "carbrand" id = "carbrand">
                                <option value="<?php echo $_GET['car_brand']?>">Please select a car brand</option>
                                </select>
                                <br>
                                <br>
                             </div>

                            <div class="form-group">
                            <div class="col-sm-6">
                            <label>Car model</label>
                            </div>
                                <select name = "carmodel" id = "carmodel">
                                    <option value="<?php echo $_GET['car_model']?>">Please select a car brand first</option>
                                </select>
                                <br>
                                <br>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-6">
                            <label>Year</label>
                            </div>
                                <select  name = "year" id = "year">
                                    <option value="<?php echo $_GET['year']?>">Please select a car model first</option>
                                </select>
                                <br>
                                <br>
                            </div>

                        <div class="form-group">
                        <div class="col-sm-6">
                                <label>Engine Size</label>
                        </div>
                                <select name = "enginesize" id = "enginesize">
                                <option value="<?php echo $_GET['engine_size'];?>"><?php echo $_GET['engine_size']?></option>
                                <option value="1.2">1.2</option>
                                <option value="1.3">1.3</option>
                                <option value="1.5">1.5</option>
                                <option value="1.6">1.6</option>
                                <option value="1.8">1.8</option>
                                <option value="2.0">2.0</option>
                                <option value="2.5">2.5</option>
                                <option value="2.8">2.8</option>
                                <option value="3.0">3.0</option>
                                <option value="3.2">3.2</option>
                                <option value="3.3">3.3</option>
                                <option value="3.5">3.5</option>
                                <option value="3.7">3.7</option>
                                <option value="3.8">3.8</option>
                                <option value="3.9">3.9</option>
                                <option value="4.1">4.1</option>
                                </select>
                                <br>
                                <br>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-6">
                                <label>Category</label>
                            </div>
                                <select class="form-control" name = "category" id = "category" required="">
                                <option value="Oils and Fluids">Oils and fluids</option>
                                <option value="Brake System">Brake System</option>
                                <option value="Filters">Filters</option>
                                <option value="Engine">Engine</option>
                                <option value="Windscreen cleaning system">Windscreen cleaning system</option>
                                <option value="Ingnition and Glowplug System">Brake System</option>
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
                                <br>
                            </div>

                            <div class="form-group">
                            <label>Product name</label>
                            <input type="text" class="form-control" name="name" value= "<?php echo $_GET['productname']?>">
                        </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" value="<?php echo $_GET['quantity']?>" name = "quantity" class="form-control" data-parsley-length="[1, 10]"/>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" value="<?php echo $_GET['price']?>" name = "price" class="form-control"  data-parsley-pattern="^\d+(.\d+)?$"/>
                            </div>
                            <div class="form-group">
                                <label>Shipping</label>
                                <input type="text" value="<?php echo $_GET['shippingcost']?>" name = "shipping" class="form-control" data-parsley-pattern="^\d+(.\d+)?$"/>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control rounded-0" name="description" id="description" rows="3" cols="100" style = "height: 150px;"
                                 data-parsley-length="[10, 1200]"><?php echo $_GET['description'];?></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="editproductID" value= "<?php echo $_GET['carpartID']?>">
                        <button type="submit" value="Yes" class="btn btn-info">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include_once 'includes/footer.inc.php';
