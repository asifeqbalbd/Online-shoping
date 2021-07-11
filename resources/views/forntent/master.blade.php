<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('/forntent') }}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/styles.css">
    <!-- stripe css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/stripe.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ url('/forntent') }}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{ url('/forntent') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="{{route('Search')}}" method="POST">
                            @csrf
                            <input type="text" name="search" placeholder="Search Here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            @php
                                $profile = \App\Profile::all()->first();
                            @endphp
                            <li><i class="fa fa-phone"></i> +{{ $profile->phone }}</li>
                            <li><i class="fa fa-envelope"></i> {{ $profile->email }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    @auth
                                        <li>
                                            <a class="dropdown-item notify-item fi-power" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                        <li><a href="{{ route('cart') }}">Cart</a></li>
                                        <li><a href="{{ route('Wishlist') }}">wishlist</a></li>
                                    @else
                                        <li><a href=" {{ url('/login') }} ">Login</a></li>
                                    @endauth
                                    <li><a href=" {{ url('/register') }} ">Register</a></li>

                                </ul>
                            </li>
                            @auth
                                <li><a href=" {{ url('/home') }} "> Home </a></li>
                            @else
                                <li><a href="{{ url('/register') }}"> Login/Register </a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                        <img src="{{ url('/img/logo/').'/'.$profile->logo }}" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li>
                                    <a href="{{ route('shop') }}"> Shop </a>

                                </li>
                                <li>
                                    <a href="{{ route('cart') }}"> Cart </a>
                                </li>
                                <li><a href="{{ route('Contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            @php
                                $wishlist = \App\Wishlist::all();
                                $wishlists = $wishlist->count();
                            @endphp
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>{{ $wishlists }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @forelse($wishlist as $wishlist_value)
                                        <li class="cart-items">
                                            <div class="cart-img">
                                                <img width="80px" height="80px" src="{{ url('/img/thumbnail/'.'/'.$wishlist_value->product->product_thumbnail)  }}" alt="">
                                            </div>
                                            <div class="cart-content">
                                                <a href="">{{ $wishlist_value->product->product_name }}</a>
                                                <span>QTY : {{ $wishlist_value->product_quantity }}</span>
                                                <p>${{ $wishlist_value->product->product_price }}</p>
                                                <a href="{{ route('SingleWishlistDelete', $wishlist_value->id) }}"><i class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        @empty
                                            <li>No Wishlist Data</li>
                                    @endforelse
                                    <li>
                                        <button> <a href=" {{ route('Wishlist') }} " style="color:#ac8741;"> Wishlist Page </a></button>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                @php
                                    $carts = \App\Cart::all();
                                    $count = $carts->count();
                                    $subtotal = 0;
                                @endphp
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span> {{ $count }} </span></a>
                                <ul class="cart-wrap dropdown_style">

                                    @forelse($carts as $value)
                                    <li class="cart-items">
                                        <div class="cart-img">
                                            <img width="80px" height="80px" src="{{ url('/img/thumbnail/'.'/'.$value->product->product_thumbnail)  }}" alt="">
                                        </div>
                                        <div class="cart-content">
                                            <a href="{{ route('cart') }}"> {{ $value->product->product_name }} </a>
                                            <span>QTY : {{ $value->product_quantity }}</span>
                                            <p>$ {{ $value->product->product_price }}</p>
                                            <a href=" {{ route('SingleCartDelete', $value->id)}} "><i class="reamove fa fa-times"> </i></a>
                                        </div>
                                    </li>
                                    @php
                                        $subtotal += $value->product->product_price * $value->product_quantity
                                    @endphp
                                    @empty
                                    <li>No Cart Data</li>
                                    @endforelse

                                    <li>Subtotol: <span class="pull-right">$ {{ $subtotal }}</span></li>
                                    <li>
                                        <button><a href=" {{ route('cart') }} " style="color:#ac8741;"> Cart</a></button>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li>
                                    <a href="{{ route('shop') }}"> Shop </a>
                                </li>
                                <li>
                                   <a href="{{ route('cart') }}"> Cart </a>
                                </li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>
    <!-- header-area end -->
    @yield('content')

    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form action="{{ url('/search/product') }}" method="post">
                                @csrf
                                <input type="text" class="form-control" name="search" placeholder="Enter Your Product Name...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href=" {{ url('/') }} ">home</a></li>
                                    <li><a href={{ route('cart') }}>our Shoping</a></li>
                                    <li><a href="{{ route('Contact') }}">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $social = \App\Online::all()->first();
        @endphp
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="https://www.facebook.com/{{ $social->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/{{ $social->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://github.com/{{ $social->github }}"><i class="fa fa-github"></i></a></li>
                                <li><a href="https://www.linkedin.com/{{ $social->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.instagram.com/{{ $social->instagram }}/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>{{ $profile->sammary }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email : </span> {{ $profile->email }}</a></li>
                                <li><a href="#"><span>Tel : {{ $profile->phone }}</span> </a></li>
                                <li><a href="#"><span>Address : </span> {{ $profile->address }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>A A A Tohoney - {{ $profile->created_at->format('d M Y') }} {{ $profile->copyright }}.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- jquery latest version -->
    <script src="{{ url('/forntent') }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ url('/forntent') }}/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ url('/forntent') }}/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ url('/forntent') }}/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ url('/forntent') }}/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ url('/forntent') }}/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ url('/forntent') }}/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ url('/forntent') }}/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ url('/forntent') }}/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ url('/forntent') }}/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ url('/forntent') }}/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ url('/forntent') }}/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ url('/forntent') }}/js/scripts.js"></script>
    <!-- stripe js -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ url('/forntent') }}/js/stripe.js"></script>

    @yield('footer_js')
</body>
</html>
