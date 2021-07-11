@extends('forntent/master')
@section('title')
        Checkout Page | A A A Tohoney
    @endsection
@section('content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href=" {{ url('/') }} ">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                            <h3>Billing Details</h3>
                            <form action=" {{ route('Payment') }} " method="POST" id="payment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <p>First Name *</p>
                                        <input type="text" name="first_name" value=" {{ $auth_user->name }} ">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Last Name *</p>
                                        <input type="text" name="last_name" value=" {{ $auth_user->last_name }} ">
                                    </div>
                                    <div class="col-12">
                                        <p>Compani Name</p>
                                        <input type="text" name="compani_name">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Email Address *</p>
                                        <input type="email" name="email" value="{{ $auth_user->email }}">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Phone No. *</p>
                                        <input type="text" name="phone">
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Country *</p>
                                        <select name="country_id" id="country_id">
                                            <option value="">Select One</option>
                                            @foreach($countres as $country)
                                            <option value=" {{ $country->id }} "> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>States *</p>
                                        <select name="state_id" id="state_id">

                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Town/City *</p>
                                        <select name="city_id" id="city_id">

                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <p>Postcode/ZIP</p>
                                        <input type="text" name="post_zip">
                                    </div>
                                    <div class="col-12">
                                        <p>Your Address *</p>
                                        <input type="text" name="address">
                                    </div>
                                    <div class="col-12">
                                        <p>Order Notes </p>
                                        <textarea name="massage"></textarea>
                                    </div>
                                </div>
                        </div>
                </div>
                <div class="col-lg-4">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="total-cost">
                                <li>Subtotal <span class="pull-right"><strong>$ {{ $sub_total }} </strong></span></li>
                                <li>Discount <span class="pull-right"><strong> {{ $discount }} % </strong></span></li>
                                <li>Shipping <span class="pull-right">Free</span></li>
                                <li>Total<span class="pull-right">$ {{ $total }} </span></li>
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input id="bank" type="radio" name="payment" value="Stripe">
                                    <label for="bank">Stripe</label>
                                </li>
                                <li>
                                    <input id="paypal" type="radio" name="payment" value="Paypal">
                                    <label for="paypal">Paypal</label>
                                </li>
                                <li>
                                    <input id="card" type="radio" name="payment" value="Card">
                                    <label for="card">Credit Card</label>
                                </li>
                                <li>
                                    <input id="delivery" type="radio" name="payment" value="Cash">
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </ul>
                            <div class="form-row">
                                <label for="card-element">
                                  Credit or debit card
                                </label>
                                <div class="stripe_is_id" id="card-element">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <br>
                            <button type="submit">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection

@section('footer_js')
<script type="text/javascript">
    $('#country_id').change(function(){
        var countryID = $(this).val();

        if(countryID){
            $.ajax({
                type:"GET",
                url:"{{url('api/get-state-list')}}/"+countryID,
                success:function(res){
                    if(res){
                        $("#state_id").empty();
                        $("#state_id").append('<option>Select State</option>');
                        $.each(res,function(key,value){
                            $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });

                    }else{
                        $("#state_id").empty();
                    }
                }
            });
        }else{
            $("#state_id").empty();
            $("#city_id").empty();
        }
    });
    $('#state_id').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url:"{{url('api/get-city-list')}}/"+stateID,
                success:function(res){
                    if(res){
                        $("#city_id").empty();
                        $.each(res,function(key,value){
                            $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });

                    }else{
                        $("#city_id").empty();
                    }
                }
            });
        }else{
            $("#city_id").empty();
        }

    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script>
        $(document).ready(function(){
            $('.couponbtn').click(function(){
                var couponvalue = $('.couponvalue').val();
                window.location.href = ' {{ url("/Checkout") }}/'+ couponvalue;
            })
        })
    </script>
@endsection
