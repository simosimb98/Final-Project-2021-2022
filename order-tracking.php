<?php
include_once "includes/header.inc.php";
?>
    <div class="page-banner-area item-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Order Tracking</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Order Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="track-order-area ptb-100">
        <div class="container">
            <div class="track-order-content">
                <h2>All In One Package Tracking</h2>
                <form>
                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Billing Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <button type="submit" class="default-btn">Track Order</button>
                </form>
            </div>
        </div>
    </section>

<?php
include_once "includes/footer.inc.php";
?>