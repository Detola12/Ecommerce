@php
    if (isset($ratings->rating)){
    if ($ratings->rating == 0){
        $ratings->rating = 'Extreme Bad';
    }
    if ($ratings->rating == 1){
        $ratings->rating = 'Very Bad';
    }
    if ($ratings->rating == 2){
        $ratings->rating = 'Bad';
    }
    if ($ratings->rating == 3){
        $ratings->rating = 'Average';
    }
    if ($ratings->rating == 4){
        $ratings->rating = 'Good';
    }
    if ($ratings->rating == 5){
        $ratings->rating = 'Very Good';
    }
    }
@endphp

@extends('layout.app')

@section('content')
    {{-- <style>
        .stars{
            display: flex;
            justify-content: center;
        }

        .star{
            color: #ccc;
            font-size: 24px;
            cursor: pointer;
        }

        #rating-input{
            display: none;
        }

        .star:hover, .star.selected{
            color: #ffcc00;
        }

        .stars.active::before{
            content: '\2605';
        }
    </style> --}}

    <div class="breadcrumb-area bg-img bg-bluegray" style="background-image:url(assets/images/bg/breadcrumb.jpg); ">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Product details page</h2>
                <ul>
                    <li>
                        <a href="index-2.html">Home</a>
                    </li>
                    <li class="active">Product details </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-details-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="product-details-img-left">
                        <img src="
                                                        @if($products->image != '')
                        {{ asset('uploads/products/big/'.$products->image) }}
                        @else
                        {{ asset('assets/images/product/Hi.jpg') }}
                        @endif
                            " alt="product">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 d-flex align-items-center">
                    <div class="product-details-content pro-details-content-modify">
                        <span>{{ $products->category['category_name'] }}</span>
                        <h2>{{ $products->name }}</h2>
                        <div class="product-ratting-review">
                            <form action="" method="post">
                                @csrf
                            </form>
                            {{--<div class="product-review">
                                <span>40+ Reviews</span>
                            </div>--}}
                        </div>

                        <div class="pro-details-price-wrap">
                            <div class="product-price">
                                <span>&#8358;{{$products->price}}</span>
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
                            <a href="{{ route('add_to_cart', $products->id) }}">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($ratings)
        <p class="d-flex justify-content-center mb-4">You rated this product {{ $ratings->rating }}</p>

    @else

        <div class="mb-4">
            <p class="d-flex justify-content-center">What would you rate this product</p>
            <form action="{{ route('save_rating', $products->id) }}" method="post">
                @csrf
                <div class="d-flex justify-content-center align-items-center">
                    <input type="radio" name="rate" style="height: 10px; width: 30px;" value="1">Very Bad
                    <input type="radio" name="rate" style="height: 10px; width: 30px;" value="2">Bad
                    <input type="radio" name="rate" style="height: 10px; width: 30px;" value="3">Average
                    <input type="radio" name="rate" style="height: 10px; width: 30px;" value="4">Good
                    <input type="radio" name="rate" style="height: 10px; width: 30px;" value="5">Very Good
                    <button type="submit" class="btn btn-dark" style="margin-left: 30px">Submit</button>

                </div>
                <br>
            </form>
            {{-- <div class="product-ratting d-flex justify-content-center">
                <div class="star" data-rating="1">&#9733;</div>
                <div class="star" data-rating="2">&#9733;</div>
                <div class="star" data-rating="3">&#9733;</div>
                <div class="star" data-rating="4">&#9733;</div>
                <div class="star" data-rating="5">&#9733;</div> --}}

        </div>
        @endif

        </div>

        <div class="description-review-wrapper pb-90">
            <div class="container">
                <div class="row">
                    <div class="ms-auto me-auto col-lg-10">
                        <div class="dec-review-topbar nav mb-40">
                            <a data-bs-toggle="tab" href="#des-details1">Description</a>
                            <a class="active" data-bs-toggle="tab" href="#des-details2">Specification</a>
                        </div>
                        <div class="tab-content dec-review-bottom">
                            <div id="des-details1" class="tab-pane">
                                <div class="description-wrap">
                                    <p>{{ $products->description }}</p>
                                </div>
                            </div>
                            <div id="des-details2" class="tab-pane active">
                                <div class="specification-wrap table-responsive">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="width1">Name / Model</td>
                                            <td>{{ $products->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="width1">Categories</td>
                                            <td>{{ $products->category['category_name'] }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-6 mb-50 text-center">
                    <h2>Related Product</h2>
                </div>
                <div class="product-slider-active owl-carousel">
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="product-details.html"><img src="assets/images/product/pro-hm1-5.jpg" alt="product"></a>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="product-details.html"><img src="assets/images/product/pro-hm1-6.jpg" alt="product"></a>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                    <span class="old">$230.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="product-details.html"><img src="assets/images/product/pro-hm1-7.jpg" alt="product"></a>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$250.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="product-details.html"><img src="assets/images/product/pro-hm1-8.jpg" alt="product"></a>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$320.00</span>
                                    <span class="old">$120.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="product-details.html"><img src="assets/images/product/pro-hm1-6.jpg" alt="product"></a>
                            <span class="price-dec">-30%</span>
                            <div class="product-action">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Quick View" href="#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                    <span class="old">$230.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
