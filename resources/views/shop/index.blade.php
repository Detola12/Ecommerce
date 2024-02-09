

@extends('layout.app')

@section('content')

    <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>shop page</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">shop </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-90 pb-90">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-topbar-wrapper d-flex align-items-center">
                        <div class="shop-topbar-left">
                            <div class="view-mode nav">
                                <a class="active" href="#shop-1" data-bs-toggle="tab"><i class="la la-th"></i></a>
                                <a href="#shop-2" data-bs-toggle="tab"><i class="la la-list-ul"></i></a>
                            </div>
                            <p>Showing 1 - 20 of 30 results </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="sidebar-widget">
                                <div class="sidebar-search">
                                    <form class="sidebar-search-form">
                                        <input type="text" name="search" placeholder="Search here...">
                                        <button>
                                            <i class="la la-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{--<div class="product-shorting shorting-style">
                                <form action="">
                                    <label>View:</label>
                                    <select name="pagin" onchange="this.form.submit()">
                                        <option value="10" @if(request()->query("pagin") == 10) selected @endif>10</option>
                                        <option value="20" @if(request()->query("pagin") == 20) selected @endif>20</option>
                                        <option value="30" @if(request()->query("pagin") == 30) selected @endif>30</option>
                                    </select>
                                </form>
                            </div>--}}
                            <div class="product-show shorting-style">
                                <form action="" >
                                    @csrf
                                    <label>Sort by:</label>
                                    <select name="sort_by" onchange="this.form.submit()">
                                        <option value="">Default</option>
                                        <option value="name" @if(request()->query('sort_by') == 'name') selected @endif> Name</option>
                                        <option value="price" @if(request()->query('sort_by') == 'price') selected @endif> price</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h2 class="my-5 fw-light" ><span style="color: #ff5151">Products</span></h2>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-wrap mb-35" style="opacity: 1 !important;">
                                                <div class="product-img mb-15">
                                                    <a href="{{ route('product_details', $product->id) }}"><img style="height: 200px; width:100%" src="
                                                        @if(asset('assets/images/products/'.$product->image))
                                                            {{ asset('assets/images/products/'.$product->image)}}
                                                    
                                                        @elseif($product->image != '')
                                                        {{ asset('uploads/products/big/'.$product->image) }}
                                                        @else
                                                        {{ asset('assets/images/product/Hi.jpg') }}
                                                        @endif" alt="product"></a>

                                                    <div class="product-action">
                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" title="Wish List" href="#"><i class="la la-plus"></i></a>
                                                        @if (in_array($product->id, $likes))

                                                        @else
                                                        <a title="Like" class="likeb" href="{{ route('liked', $product->id) }}" data-product-id="{{ $product->id }}"><i class="la la-heart-o"></i></a>

                                                        @endif

                                                        <a title="Compare" href="#"><i class="la la-retweet"></i></a>


                                                    </div>

                                                </div>
                                                <div class="product-content">
                                                    <span>{{$product->category['category_name']}}</span>
                                                    <h4><a href="{{ route('product_details', $product->id) }}">{{$product->name}}</a></h4>
                                                    <div class="price-addtocart">
                                                        <div class="product-price">
                                                            <span>&#8358;{{$product->price}}</span>
                                                        </div>
                                                        <div class="product-addtocart">
                                                            <a title="Add To Cart"  id="{{ $product->id }}" class="product_item" href="{{ route('add_to_cart', $product->id) }}">+ Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center">{{ $products->links() }}</div>

                                <h2 class="my-5 fw-light" >Recommended <span style="color: #ff5151">Products</span></h2>
                                <div class="row">
                                    @foreach($recommend as $product)
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-wrap mb-35" style="opacity: 1 !important;">
                                                <div class="product-img mb-15">
                                                    <a href="{{ route('product_details', $product->id) }}"><img src="
                                                        @if($product->image != '')
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
                                                    <span>{{$product->category['category_name']}}</span>
                                                    <h4><a href="{{ route('product_details', $product->id) }}">{{$product->name}}</a></h4>
                                                    <div class="price-addtocart">
                                                        <div class="product-price">
                                                            <span>&#8358;{{$product->price}}</span>
                                                        </div>
                                                        <div class="product-addtocart">
                                                            <a title="Add To Cart"  id="{{ $product->id }}" class="product_item" href="{{ route('add_to_cart', $product->id) }}">+ Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                                {{-- <div class="col-lg-3">
                                    <div class="sidebar-wrapper">
                                        <div class="sidebar-widget">
                                            <h4 class="sidebar-title">Search </h4>
                                            <div class="sidebar-search mb-40 mt-20">
                                                <form class="sidebar-search-form">
                                                    <input type="text" name="search" placeholder="Search here...">
                                                    <button>
                                                        <i class="la la-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="sidebar-widget shop-sidebar-border pt-40">
                                            <h4 class="sidebar-title">Shop By Categories</h4>
                                            <div class="shop-catigory mt-20">
                                                @foreach($category as $item)
                                                <ul id="faq">
                                                    <li class="pb-3"> <a  href="{{ route('productCategory', [$item->id]) }}">{{ $item->category_name }}<i class="la la-angle-down"></i></a>
                                                        @if($item->has_children > 0)
                                                        <ul id="shop-catigory-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                                            <li><a href="#"></a></li>
                                                        </ul>
                                                        @endif
                                                    </li>

                                                </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.likeb').on('click', function(){
                var productId = $(this).data('product-id');
                var url = '/shop/' + productId + '/like';


                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response){
                        console.log('Product Liked Successfully');
                    },
                    error: function(xhr,status, error){
                        console.error(error);
                    }
                })
            })
        })
    </script>
@endsection
