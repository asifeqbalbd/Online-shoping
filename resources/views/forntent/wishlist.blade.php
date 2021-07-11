@extends('forntent/master')
    @section('title')
        Wishlist Page | A A A Tohoney
    @endsection
    @section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Wishlist</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="addcart">Add to Cart</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($wishlists as $wishlist_value)
                                <tr>
                                    <td class="images"><img width="80px" height="80px" src="{{ url('/img/thumbnail/'.'/'.$wishlist_value->product->product_thumbnail)  }}" alt=""></td>
                                    <td class="product"><a href="single-product.html">{{ $wishlist_value->product->product_name }}</a></td>
                                    <td class="ptice">${{ $wishlist_value->product->product_price }}</td>
                                    <td class="addcart"><a href="{{ route('SingleCart',$wishlist_value->product_id) }}">Add to Cart</a></td>
                                    <td class="remove"><a href="{{ route('SingleWishlistDelete', $wishlist_value->id) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">You have not Wishlist any item</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
    @endsection
