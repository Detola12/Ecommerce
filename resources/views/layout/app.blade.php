<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daxone - eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/line-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/themify.css')}}">
    <!-- othres CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>

<body>
<div class="main-wrapper">
    <header class="header-area transparent-bar sticky-bar">
        <div class="main-header-wrap">
            <div class="container">
                <div class="row @guest pb-4 @endguest ">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo mt-40">
                            <a href="index-2.html"><img src="{{asset('assets/images/logo/logo-1.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="main-menu menu-common-style menu-lh-1 menu-other-style">
                            <nav>
                                <ul class="d-flex">


                                    @auth
                                        <li class=""><a class="fs-5" href="{{url('/')}}">Home</a>

                                        </li>
                                        <li class=""><a class="fs-5" href="{{ url('/shop') }}">Shop </a>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 position-relative">
                        <div class="header-right-wrap mt-40 align-items-center">
                            @auth
                                <div>
                                    <div class="pe-3 user_option" style="font-size: 18px; cursor: pointer">{{ auth()->user()->firstname }}</div>
                                    <ul class="user-menu">
                                        <li class="py-2"><a href="{{ url('/dashboard')}}">Dashboard</a> </li>
                                        <li class="py-2">
                                            <a href="{{ route('logout') }}">Logout</a>

                                        </li>
                                    </ul>
                                </div>

                                @include('partials._cart')
                                <div class="search-wrap common-style ml-25">
                                    <button class="search-active">
                                        <i class="la la-search"></i>
                                    </button>
                                </div>
                            @endauth
                            @guest
                                <div class="py-2">
                                    <ul class="d-flex">
                                        <li class="pe-5 fs-5"><a href="{{route('login')}}">Login</a>

                                        </li>

                                        <li class="fs-5"><a href="{{route('create_user')}}">Register</a>

                                        </li>
                                    </ul>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="la la-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                    <form>
                        <div class="form-search">
                            <input id="search" class="input-text" value="" placeholder="Search Now" type="search">
                            <button>
                                <i class="la la-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-small-mobile">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo">
                            <a href="index-2.html">
                                <img alt="" src="{{asset('assets/images/logo/logo-1.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-right-wrap">
                            @auth()
                                <div class="cart-wrap common-style">
                                    <button class="cart-active">
                                        <i class="la la-shopping-cart pb-1"></i>
                                        <span class="count-style">2 Items</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <h4>Your Cart</h4>
                                            <a class="cart-close" href="#"><i class="la la-close"></i></a>
                                        </div>
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{asset('assets/images/cart/cart-1.jpg')}}"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{asset('assets/images/cart/cart-2.jpg')}}"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{asset('assets/images/cart/cart-3.jpg')}}"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total">
                                                <h4>Subtotal <span class="shop-total">$290.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover default-btn text-center">
                                                <a class="black-color" href="checkout.html">Continue to Chackout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="me-4 fw-bold">
                                    Register
                                </div>
                            @endauth
                            <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i class="la la-navicon la-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-off-canvas-active">
        <a class="mobile-aside-close"><i class="la la-close"></i></a>
        <div class="header-mobile-aside-wrap">
            <div class="mobile-search">
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button class="button-search"><i class="la la-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap">
                <!-- mobile menu start -->
                <div class="mobile-navigation">
                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="index-2.html">Home</a>

                            </li>
                            <li><a href="#">Shop</a>

                            </li>

                            @auth()
                                <li><a href="">{{auth()->user()->firstname}}</a></li>

                                <li><a href="{{ route('logout') }}">Logout</a></li>

                            @else
                                <li><a href="{{route('login')}}">Login</a>

                                </li>
                                <li><a href="{{route('create_user')}}">Register</a>

                                </li>
                            @endauth
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-language-active" href="#">Language <i class="la la-angle-down"></i></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            <li><a href="#">English (US)</a></li>
                            <li><a href="#">English (UK)</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-curr-lang">
                    <a class="mobile-currency-active" href="#">Currency <i class="la la-angle-down"></i></a>
                    <div class="lang-curr-dropdown curr-dropdown-active">
                        <ul>
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">Real</a></li>
                            <li><a href="#">BDT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-mobile-curr-lang">
                    <a class="mobile-account-active" href="#">My Account <i class="la la-angle-down"></i></a>
                    <div class="lang-curr-dropdown account-dropdown-active">
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Creat Account</a></li>
                            <li><a href="#">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mobile-social-wrap">
                <a class="facebook" href="#"><i class="ti-facebook"></i></a>
                <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
                <a class="pinterest" href="#"><i class="ti-pinterest"></i></a>
                <a class="instagram" href="#"><i class="ti-instagram"></i></a>
                <a class="google" href="#"><i class="ti-google"></i></a>
            </div>
        </div>
    </div>


    @yield('content')

    <footer class="footer-area">
        <div class="footer-top bg-gray pt-120 pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="footer-widget mb-30">
                            <a href="#"><img src="{{asset('assets/images/logo/logo-1.png')}}" alt="logo"></a>
                            <div class="footer-social">
                                <span>Follow us:</span>
                                <ul>
                                    <li><a href="#"><i class=" ti-facebook "></i></a></li>
                                    <li><a href="#"><i class=" ti-twitter-alt "></i></a></li>
                                    <li><a href="#"><i class=" ti-pinterest "></i></a></li>
                                    <li><a href="#"><i class=" ti-vimeo-alt "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                        <div class="footer-widget mb-30 footer-mrg-hm1">
                            <div class="footer-title">
                                <h3>Useful Link</h3>
                            </div>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="#">Shopping Cat</a></li>
                                    <li><a href="#">WIshlist</a></li>
                                    <li><a href="#">Chekout</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2 col-12 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-title">
                                <h3>About us</h3>
                            </div>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-title">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="subscribe-style mt-45">
                                <p>Subscribe to get all new updates</p>
                                <div id="mc_embed_signup" class="subscribe-form mt-20">
                                    <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="https:/devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input class="email" type="email" required="" placeholder="Enter your email" name="EMAIL" value="">
                                            <div class="mc-news" aria-hidden="true">
                                                <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                            </div>
                                            <div class="clear">
                                                <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-gray-2 ptb-20">
            <div class="container">
                <div class="copyright text-center">
                    <p>Copyright © <a href="#">Daxone</a>. All Right Reserved</p>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
<!-- Modernizer JS -->
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/vendor/popper.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>

<!-- Slick Slider JS -->
<script src="{{asset('assets/js/plugins/countdown.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/instafeed.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/textillate.js')}}"></script>
<script src="{{asset('assets/js/plugins/elevatezoom.js')}}"></script>
<script src="{{asset('assets/js/plugins/sticky-sidebar.js')}}"></script>
<script src="{{asset('assets/js/plugins/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/sweetalerts.init.js')}}" ></script>
<script src="{{asset('assets/js/rating.init.js')}}" ></script>
<script src="{{asset('node-modules/rater-js/index.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


</body>

</html>
