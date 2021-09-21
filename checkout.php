<?php
include_once "includes/header.inc.php";
?>
    <div class="page-banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-banner-content">
                        <h2>Checkout</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-area ptb-100">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="user-actions">
                            <i class='bx bx-log-in'></i>
                            <span>Returning customer? <a href="#">Click here to login</a></span>
                        </div>
                        <div class="billing-details">
                            <h3 class="title">Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Country <span class="required">*</span></label>
                                        <div class="select-box">
                                            <select>
                                                <option>United Arab Emirates</option>
                                                <option>China</option>
                                                <option>United Kingdom</option>
                                                <option>Germany</option>
                                                <option>France</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="create-an-account">
                                        <label class="form-check-label" for="create-an-account">Create an account?</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="ship-different-address">
                                        <label class="form-check-label" for="ship-different-address">Ship to a different address?</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="order-details">
                            <div class="cart-totals">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li>Subtotal <span>$599.00</span></li>
                                    <li>Shipping <span>$30.00</span></li>
                                    <li>Total <span>$599.00</span></li>
                                    <li>Payable Total <span>$599.00</span></li>
                                </ul>
                                <a href="#" class="default-btn">
                                    Proceed to Checkout
                                </a>
                            </div>
                            <div class="payment-box">
                                <h3 class="title">Payment Method</h3>
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                        <label for="direct-bank-transfer">Direct Bank Transfer</label>
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                                    </p>
                                    <p>
                                        <input type="radio" id="cash-on-delivery" name="radio-group">
                                        <label for="cash-on-delivery">Cash on Delivery</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="check-payments" name="radio-group">
                                        <label for="check-payments">Check Payments</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="paypal" name="radio-group">
                                        <label for="paypal">PayPal</label>
                                    </p>
                                </div>
                                <a href="#" class="default-btn">
                                    Place Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php
include_once "includes/footer.inc.php";
?>