@php
    $total = \App\Http\Controllers\CartController::get_total();
@endphp

@extends('layout.app')

@section('content')
    <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>checkout page</h2>
                <ul>
                    <li>
                        <a href="index-2.html">Home</a>
                    </li>
                    <li class="active">checkout </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="checkout-main-area pt-90 pb-90">
        <div class="container">
            <div class="checkout-wrap pt-30">
                <div class="row">
{{--                    <div class="col-lg-7">--}}
{{--                        <div class="billing-info-wrap mr-50">--}}
{{--                            <h3>Billing Details</h3>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>First Name <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Last Name <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Company Name <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-select mb-20">--}}
{{--                                        <label>Country <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <select>--}}
{{--                                            <option>Select a country</option>--}}
{{--                                            <option>Azerbaijan</option>--}}
{{--                                            <option>Bahamas</option>--}}
{{--                                            <option>Bahrain</option>--}}
{{--                                            <option>Bangladesh</option>--}}
{{--                                            <option>Barbados</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Street Address <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input class="billing-address" placeholder="House number and street name" type="text">--}}
{{--                                        <input placeholder="Apartment, suite, unit etc." type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Town / City <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>State / County <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Phone <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="billing-info mb-20">--}}
{{--                                        <label>Email Address <abbr class="required" title="required">*</abbr></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="checkout-account mb-25">--}}
{{--                                <input class="checkout-toggle2" type="checkbox">--}}
{{--                                <span>Create an account?</span>--}}
{{--                            </div>--}}
{{--                            <div class="checkout-account-toggle open-toggle2 mb-30">--}}
{{--                                <label>Email Address</label>--}}
{{--                                <input placeholder="Password" type="password">--}}
{{--                            </div>--}}
{{--                            <div class="checkout-account mt-25">--}}
{{--                                <input class="checkout-toggle" type="checkbox">--}}
{{--                                <span>Ship to a different address?</span>--}}
{{--                            </div>--}}
{{--                            <div class="different-address open-toggle mt-30">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>First Name</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Last Name</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Company Name</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="billing-select mb-20">--}}
{{--                                            <label>Country</label>--}}
{{--                                            <select>--}}
{{--                                                <option>Select a country</option>--}}
{{--                                                <option>Azerbaijan</option>--}}
{{--                                                <option>Bahamas</option>--}}
{{--                                                <option>Bahrain</option>--}}
{{--                                                <option>Bangladesh</option>--}}
{{--                                                <option>Barbados</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Street Address</label>--}}
{{--                                            <input class="billing-address" placeholder="House number and street name" type="text">--}}
{{--                                            <input placeholder="Apartment, suite, unit etc." type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Town / City</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>State / County</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Postcode / ZIP</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Phone</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 col-md-6">--}}
{{--                                        <div class="billing-info mb-20">--}}
{{--                                            <label>Email Address</label>--}}
{{--                                            <input type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="additional-info-wrap">--}}
{{--                                <label>Order notes</label>--}}
{{--                                <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="message"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="container">
                        @if(session('status'))
                            <p class="bg-danger py-2 text-white-50">{{ session('status') }}</p>
                        @endif
                    </div>
                    <div class=" {{--col-lg-5--}} d-flex justify-content-center">

                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Product <span>Total</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach($value as $id => $items)
                                            <li>{{ $items['name'] }} X {{ $items['quantity'] }} <span>&#8358;{{ $items['price'] }} </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Subtotal <span>&#8358;{{ $total }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li class="d-flex align-items-center">Shipping <p class="ms-auto"><input type="text" placeholder="Enter a shipping address" style="border: none; background-color: transparent;"> </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Total <span> &#8358;{{ $total }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="cheque" checked="checked" name="payment_method">
                                        <label for="payment_method_1"> Direct Bank Transfer </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-2" class="input-radio" type="radio" value="cheque" name="payment_method">
                                        <label for="payment-method-2">Check payments</label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="cheque" name="payment_method">
                                        <label for="payment-method-3">Cash on delivery </label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                    <div class="pay-top sin-payment sin-payment-3">
                                        <input id="payment-method-4" class="input-radio" type="radio" value="cheque" name="payment_method">
                                        <label for="payment-method-4">PayPal <img alt="" src="assets/images/icon-img/payment.png"><a href="#">What is PayPal?</a></label>
                                        <div class="payment-box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-40">
                                <a href="{{ route('pay') }}">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
