@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
<!--main area-->
<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class=" main-content-area">
    <form action="{{url('place_order')}}" method="post" >
        @csrf
        <div class="wrap-address-billing">
            <h3 class="box-title">Billing Address</h3>
            
                <p class="row-in-form">
                    <label for="fname">first name<span>*</span></label>
                    <input id="fname" type="text" name="name" value="{{Auth::user()->name}}" required placeholder="Your name">
                </p>
                <p class="row-in-form">
                    <label for="lname">last name<span>*</span></label>
                    <input id="lname" type="text" name="lname" value="" placeholder="Your last name">
                </p>
                <p class="row-in-form">
                    <label for="email">Email Addreess:</label>
                    <input id="email" type="email" name="email" value="{{Auth::user()->email}}" required placeholder="Type your email">
                </p>
                <p class="row-in-form">
                    <label for="phone">Phone number<span>*</span></label>
                    <input id="phone" type="number" name="phone" value="{{Auth::user()->phone}}" required placeholder="10 digits format">
                </p>
                <p class="row-in-form">
                    <label for="add">Address:</label>
                    <input id="add" type="text" name="address" value="{{Auth::user()->address}}" required placeholder="Street at apartment number">
                </p>
                <p class="row-in-form">
                    <label for="country">Country<span>*</span></label>
                    <input id="country" type="text" name="country" value="{{Auth::user()->country}}" required placeholder="United States">
                </p>
                <p class="row-in-form">
                    <label for="zip-code">Postcode / ZIP:</label>
                    <input id="zip-code" type="number" name="zip" value="{{Auth::user()->zip}}" required placeholder="Your postal code">
                </p>
                <p class="row-in-form">
                    <label for="city">Town / City<span>*</span></label>
                    <input id="city" type="text" name="city" value="{{Auth::user()->city}}" required placeholder="City name">
                </p>
                
        </div>
        <div class="summary summary-checkout">
            <div class="summary-item payment-method">
                <h4 class="title-box">Payment Method</h4>
                <p class="summary-info"><span class="title">Check / Money order</span></p>
                <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                <div class="choose-payment-methods required">
                    <label class="payment-method">
                        <input name="payment_type" id="payment-method-bank" required value="bank" type="radio">
                        <span>Direct Bank Transder</span>
                        <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
                    </label>
                    <label class="payment-method">
                        <input name="payment_type" id="payment-method-visa" required value="visa" type="radio">
                        <span>visa</span>
                        <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                    </label>
                    <label class="payment-method">
                        <input name="payment_type" id="payment-method-paypal" required value="paypal" type="radio">
                        <span>Paypal</span>
                        <span class="payment-desc">You can pay with your credit</span>
                        <span class="payment-desc">card if you don't have a paypal account</span>
                    </label>
                    <label class="payment-method">
                        <input name="payment_type" id="payment-method-paypal" required value="Bkash" type="radio">
                        <span>Bkash</span>
                        <span class="payment-desc">You can pay with your credit</span>
                        <span class="payment-desc">card if you don't have a paypal account</span>
                    </label>
                    <label class="payment-method">
                        <input name="payment_type" id="payment-method-paypal" required value="Nagad" type="radio">
                        <span>Nagad</span>
                        <span class="payment-desc">You can pay with your credit</span>
                        <span class="payment-desc">card if you don't have a paypal account</span>
                    </label>
                </div>
                @php $sub_total = 0; @endphp
                @foreach($carts as $cart)
                    @php 
                        $sub_total += $cart->product->price * $cart->qty; 
                        $total = $sub_total + 200;
                    @endphp
                @endforeach
                <input type="hidden" name="sub_total" value="{{$sub_total}}">
                <input type="hidden" name="total" value="{{$total}}">
                <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">$ {{$total}}</span></p>
                <!-- <a href="thankyou.html" class="btn btn-medium">Place order now</a> -->

                <button type="submit" class="btn btn-medium">Place Order Now</button>
                <!-- <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button> -->
            </div>
            <div class="summary-item shipping-method">
                <h4 class="title-box f-title">Shipping method</h4>
                <p class="summary-info"><span class="title">Flat Rate</span></p>
                <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                <h4 class="title-box">Discount Codes</h4>
                <p class="row-in-form">
                    <label for="coupon-code">Enter Your Coupon code:</label>
                    <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                </p>
                <!-- <a href="#" class="btn btn-small">Apply</a> -->
                <button class="your-button-class" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="An URL where backend code will initiate the payment to SSLCOMMERZ"> Pay Now
                </button>
                <script>
                    (function (window, document) {
                        var loader = function () {
                            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                            tag.parentNode.insertBefore(script, tag);
                        };

                        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
                    })(window, document);
                </script>
            </div>
        </div>
        </form>

        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>
                </div>
            </div><!--End wrap-products-->
        </div>

    </div><!--end main content area-->
</div><!--end container-->

</main>
<!--main area-->
@endsection