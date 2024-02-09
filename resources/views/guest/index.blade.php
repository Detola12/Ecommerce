@extends('layout.app')

@section('content')


    <div class="slider-area">
        <div class="slider-active owl-carousel nav-style-1 dot-style-1 nav-dot-left">
            <div class="single-slider height-100vh bg-img" data-dot="01" style="background-image:url(assets/images/slider/hm1-bg-1.jpg);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-sin-img-hm1 slider-sin-mrg1 slider-animated-1">
                                <img class="animated" src="{{asset('assets/images/slider/iPhone-12.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                            <div class="slider-content-1 slider-animated-1 ml-70">
                                <h3 class="animated">30% off</h3>
                                <h1 class="animated">Apple Phones</h1>
                                <p class="animated">Collect & Get 30% Discount.</p>
                                <div class="slider-btn-1 default-btn btn-hover">
                                    <a class="animated btn-color-theme btn-size-md btn-style-outline" href="">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="single-slider height-100vh bg-img" data-dot="02" style="background-image:url(assets/images/slider/hm1-bg-1.jpg);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                            <div class="slider-sin-img-hm1 slider-sin-mrg1 slider-animated-1">
                                <img class="animated" src="{{asset('assets/images/slider/hm1-single-2.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                            <div class="slider-content-1 slider-animated-1 ml-70">
                                <h3 class="animated">30% off</h3>
                                <h1 class="animated">Comfort Chair</h1>
                                <p class="animated">Collect from Daxone & get 30% Discount.</p>
                                <div class="slider-btn-1 default-btn btn-hover">
                                    <a class="animated btn-color-theme btn-size-md btn-style-outline" href="product-details.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="product-area pt-130 pb-135">
        <div class="container">
            <div class="section-title text-center mb-40">
                <h2>Best Sell</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <div class="product-slider-active owl-carousel">
                @foreach ($get as $product)
                <div class="product-wrap" style="opacity: 1 !important;">
                    <div class="product-img mb-15">
                        <a href=""><img src="@if($product->image != '')
                            {{ asset('uploads/products/big/'.$product->image) }}
                            @else
                            {{ asset('assets/images/product/Hi.jpg') }}
                            @endif
                                " alt="product"></a>
                        <div class="product-action">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                            <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                            <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                        </div>
                    </div>
                    <div class="product-content">
                        <span>{{ $product->category['category_name'] }}</span>
                        <h4><a href="product-details.html">{{ $product->name }}</a></h4>
                        <div class="price-addtocart">
                            <div class="product-price">
                                <span>&#8358;{{ $product->price }}</span>
                            </div>
                            <div class="product-addtocart">
                                <a title="Add To Cart" href="#">+ Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="discount-area pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="discount-img">
                        <a href="#">
                            <img src="{{asset('assets/images/banner/banner-1.jpg')}}" alt="discount-img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="discount-content">
                        <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                        <h2>Winter Discount <br>Up to 30%</h2>
                        <p class="bright-color">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <div class="discount-btn default-btn btn-hover">
                            <a class="btn-color-theme btn-size-md btn-style-outline" href="">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title text-center mb-40">
                <h2>Hot Products</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <div class="row">
                @foreach ($products as $item)

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="product-wrap mb-35" style="opacity: 1 !important;">
                        <div class="product-img mb-15">
                            <a href=""><img src="@if($item->image != '')
                                {{ asset('uploads/products/big/'.$item->image) }}
                                @else
                                {{ asset('assets/images/product/Hi.jpg') }}
                                @endif
                                    " alt="product"></a>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>{{ $item->category['category_name'] }}</span>
                            <h4><a href="product-details.html">{{ $item->name }}</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>&#8358;{{ $item->price }}</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="{{asset('assets/images/product/quickview-l1.jpg')}}" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="{{asset('assets/images/product/quickview-l2.jpg')}}" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="{{asset('assets/images/product/quickview-l3.jpg')}}" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="{{asset('assets/images/product/quickview-l2.jpg')}}" alt="">
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                    <a class="active" data-bs-toggle="tab" href="#pro-1"><img src="{{asset('assets/images/product/quickview-s1.jpg')}}" alt=""></a>
                                    <a data-bs-toggle="tab" href="#pro-2"><img src="{{asset('assets/images/product/quickview-s2.jpg')}}" alt=""></a>
                                    <a data-bs-toggle="tab" href="#pro-3"><img src="{{asset('assets/images/product/quickview-s3.jpg')}}" alt=""></a>
                                    <a data-bs-toggle="tab" href="#pro-4"><img src="{{asset('assets/images/product/quickview-s4.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <span>Life Style</span>
                                <h2>LaaVista Depro, FX 829 v1</h2>
                                <div class="product-ratting-review">
                                    <div class="product-ratting">
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-half-o"></i>
                                    </div>
                                    <div class="product-review">
                                        <span>40+ Reviews</span>
                                    </div>
                                </div>
                                <div class="pro-details-color-wrap">
                                    <span>Color:</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="red"></li>
                                            <li class="blue"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size:</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-price-wrap">
                                    <div class="product-price">
                                        <span>$210.00</span>
                                        <span class="old">$230.00</span>
                                    </div>
                                    <div class="dec-rang"><span>- 30%</span></div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                    </div>
                                </div>
                                <div class="pro-details-compare-wishlist">
                                    <div class="pro-details-compare">
                                        <a title="Add To Compare" href="#"><i class="la la-retweet"></i> Compare</a>
                                    </div>
                                    <div class="pro-details-wishlist">
                                        <a title="Add To Wishlist" href="#"><i class="la la-heart-o"></i> Add to wish list</a>
                                    </div>
                                </div>
                                <div class="pro-details-buy-now btn-hover btn-hover-radious">
                                    <a href="#">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
