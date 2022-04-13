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
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<body>
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
                    <h5 class="text-center">Filter Products        
                    </h5>
                    <hr>

                    <div class="shop-sidebar">
                    <div class="brand-sidebar-item">
                    <div class="list-group">
                            <h3>Price</h3>
                            <input type="hidden" id="hidden_minimum_price" value="0"/>
                            <input type="hidden" id="hidden_maximum_price" value="1000"/>
                            <p id = "price_show">10 - 1000</p>
                            <div id ="price_range">
                                
                            </div>
                          </div>
                        </div>

                        <div class="brand-sidebar-item">
                            <h3>Brand</h3>
                            <ul class="brand-input-checkbox" style="height: 250px; overflow-y: scroll;">
                            <?php

                                $sql= "SELECT DISTINCT (car_brand) FROM partsdetails ORDER BY carpartID DESC;";
                                $resultBrands =  mysqli_query($conn,$sql);

                                while($rowBrands = mysqli_fetch_assoc($resultBrands)){
                                ?>
                                <li class="checkbox">
                                 <div class="list-group-item checkbox">
                                     <label>
                                         <input type="checkbox" class="common-selector brand" value="<?php echo $rowBrands['car_brand'];?>"/>
                                         <?php echo $rowBrands['car_brand'];?>
                                     </label>

                                 </div>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>

                        <div class="brand-sidebar-item">
                            <h3>Category</h3>
                            <ul class="brand-input-checkbox" style="height: 390px; overflow-y: scroll;">
                            <?php

                                $sql= "SELECT DISTINCT (category) FROM partsdetails ORDER BY carpartID DESC;";
                                $resultCategory =  mysqli_query($conn,$sql);

                                while($rowCategory = mysqli_fetch_assoc($resultCategory)){
                                ?>
                                <li class="checkbox">
                                 <div class="list-group-item checkbox">
                                     <label>
                                         <input type="checkbox" class="common-selector category" value="<?php echo $rowCategory['category'];?>"/>
                                         <?php echo $rowCategory['category'];?>
                                     </label>

                                 </div>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    </div>
        <div class="col-lg-9 col-md-12">
            <div class="row filter_data">
            
                  </div>
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

<style>
#loading
{
    text-align: center;
    background: url('fade.gif') no-repeat center;
    height: 50px;
}
</style>

<script>
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id = "loading" style=""></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var brand = get_filter('brand');
            var category = get_filter('category');
            var start_from = <?php echo $start_from?>;
            var records_per_page = <?php echo $records_per_page?>;
            $.ajax({
                url: "includes/fetch_data.inc.php",
                method : "POST",
                data: {action:action, minimum_price:minimum_price,maximum_price:maximum_price, brand:brand,
                     category:category, start_from:start_from, records_per_page:records_per_page},
            success: function(data){
                $('.filter_data').html(data);
            }
            });
        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });

            return filter;
        }

        $('.common-selector').click(function(){
            filter_data();
        });

        $('#price_range').slider({
            range:true,
            min:10,
            max:1000,
            values:[10, 1000],
            step:10,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });

    });
</script>
</body>
<?php
include_once "includes/footer.inc.php";
?>

  