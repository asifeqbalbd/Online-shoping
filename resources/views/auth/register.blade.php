@extends('forntent/master')
    @section('content')
        <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Account</h2>
                            <ul>
                                <li><a href=" {{ url('/') }} ">Home</a></li>
                                <li><span>Register</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
        <!-- checkout-area start -->
        <div class="account-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                        <div class="account-form form-style">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <p>First Name *</p>
                                    <input type="text" name="name"  class="lsam-kak">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p>Last Name *</p>
                                    <input type="text" name="last_name"  class="lsam-kak">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p>Email Address *</p>
                                    <input type="email" name="email" class="lsam-kak">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p>Password *</p>
                                    <input type="Password" name="password" class="lsam-kak">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p>Confirm Password *</p>
                                    <input type="Password" name="password_confirmation" class="lsam-kak">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit">Register</button>
                            </form>
                            <div class="text-center">
                                <a href=" {{ url('/login') }} ">Or Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->

    @endsection
