@php
    $cart = Session::get('cart');
    $total = \App\Http\Controllers\CartController::get_total();
@endphp

@if (Session::has('cart'))

    <div id="cart_content" class="cart-wrap common-style">
        <button class="cart-active">
            <i class="la la-shopping-cart"></i>
            <span class="count-style">{{ count($cart) }} Items</span>
        </button>
        <div class="shopping-cart-content" style="width: 350px">
            <div class="shopping-cart-top">
                <h4>Your Cart</h4>
                <a class="cart-close" href="#"><i class="la la-close"></i></a>
            </div>
            <ul>
                @foreach (Session::get('cart') as $id => $items)

                    <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                            <a href="#"><img alt="" src="
                                @if($items['image'] != '')
                                {{ asset('uploads/products/thumb/'.$items['image']) }}
                                @else
                                {{ asset('assets/images/product/Hi.jpg') }}
                                @endif"></a>
                            <div class="item-close">
                                <a href="#"><i class="sli sli-close"></i></a>
                            </div>
                        </div>
                        <div class="shopping-cart-title">
                            <h4 class="pb-2"><a href="#">{{ $items['name'] }}</a></h4>
                            <h5>Price: &#8358;{{ $items['price'] }}</h5>
                            <h5>Quantity: {{ $items['quantity'] }}</h5>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="{{route('remove_item', $id)}}"><i class="la la-trash"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="shopping-cart-bottom">
                <div class="shopping-cart-total">
                    <h4>Subtotal <span class="shop-total">&#8358;{{ $total }}</span></h4>
                </div>
                <div class="shopping-cart-btn btn-hover default-btn text-center d-flex">
                    <a class="black-color me-2" href="{{ route('checkout') }}">Continue to Checkout</a>
                    <a class="black-color" href="{{route('clear_cart')}}">Clear Cart</a>
                </div>
            </div>
        </div>
    </div>

@else

    <div class="cart-wrap common-style">
        <button class="cart-active">
            <i class="la la-shopping-cart"></i>
            <span class="count-style">0 Item</span>
        </button>
        <div class="shopping-cart-content">
            <div class="shopping-cart-top">
                <h4>Your Cart</h4>
                <a class="cart-close" href="#"><i class="la la-close"></i></a>
            </div>
            <p>Cart Empty</p>
        </div>
    </div>
@endif
