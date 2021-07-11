@extends('forntent/master')
    @section('title')
    Cart Page | A A A Tohoney
    @endsection
    @section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
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
                    @if(session('CartDelete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yes! </strong>{{ session('CartDelete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr>
                    @endif

                    @if(session('Expired'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Sorry ! </strong>{{ session('Expired') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr>
                    @endif
                    @if(session('cart'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Thanks ! </strong>{{ session('cart') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <hr>
                    @endif
                    @if(session('coupon'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Sorry ! </strong>{{ session('coupon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr>
                    @endif
                    <form action=" {{ route('CartvalueUpdate') }} " method="post">
                        @csrf
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @forelse($carts as $cart)
                                    <input type="hidden" value=" {{ $cart->id }} " name="cart_id[]">
                                    <tr>
                                        <td class="images"><img src=" {{ url('/img/thumbnail/'.'/'.$cart->product->product_thumbnail)  }} " alt=""></td>
                                        <td class="product"><a href="{{ route('shop', $cart->id) }}"> {{ $cart->product->product_name }}</a></td>
                                        <td class="ptice">${{ $cart->product->product_price }}</td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="product_quantity[]" value="{{ $cart->product_quantity }}" />
                                        </td>
                                        @php
                                            $total += $cart->product->product_price * $cart->product_quantity
                                        @endphp
                                        <td class="total">${{ $cart->product->product_price * $cart->product_quantity}}</td>
                                        <td class="remove" data-id="{{ $cart->id }}"><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">You have not cart any item</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                        </li>
                                        <li><a href="{{ route('shop') }}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Coupon</h3>
                                    <p>Enter Your Coupon Code if You Have One</p>

                                    <div class="cupon-wrap">
                                        <input class="couponvalue" type="text" placeholder="Cupon Code">
                                        <span class="couponbtn">Apply Coupon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>

                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>$ {{ $total }} </li>
                                        <li><span class="pull-left">Discount </span> {{ $discount }}% </li>
                                        @php
                                            $ftotal = $total - ($total * ($discount/100))
                                        @endphp
                                        <li><span class="pull-left"> Total </span> $ {{ $ftotal }} </li>
                                    </ul>
                                    <a href=" {{ route('Checkout') }} ">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
    @endsection
    @section('footer_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script>
        $(document).ready(function(){
            $('.remove').click(function(){
                var dataId = $(this).attr("data-id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                        window.location.href = ' {{ url("single/cart-delete/") }}/'+ dataId;
                    }
                  })
            })
            $('.couponbtn').click(function(){
                var couponvalue = $('.couponvalue').val();
                window.location.href = ' {{ url("/cart") }}/'+ couponvalue;
            })
        })
    </script>
    @endsection

