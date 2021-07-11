@extends('forntent/master')
    @section('title')
        Home Page | A A A Tohoney
    @endsection
    @section('content')
        <!-- slider-area start -->
        <div class="slider-area">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach(App\Slider::all() as $key => $value)
                        <div class="swiper-slide  @if($key <= 1) overlay @endif">
                            <div class="single-slider slide-inner slide-inner1">
                                <img src=" {{ url('/img/slider/').'/'.$value->slider_image }} " class="slide-inner" alt="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-lg-9 col-12">
                                            <div class="slider-content">
                                                <div class="slider-shape">
                                                    <h2 data-swiper-parallax="-500">{{ $value->slider_title }}</h2>
                                                    <p data-swiper-parallax="-400">{{ $value->slider_summary }}</p>
                                                    <a href=" {{ route('shop') }} " data-swiper-parallax="-300">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- slider-area end -->
        <!-- featured-area start -->
        <div class="featured-area featured-area2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="featured-active2 owl-carousel next-prev-style">
                            @foreach(\App\Category::all() as $category)
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="{{ url('/img/category/').'/'.$category->category_thumbnail }}" alt="">
                                    <div class="featured-content">
                                        <a href="{{ route('shop', $category->category_name) }}"> {{ $category->category_name }} </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- featured-area end -->
        <!-- start count-down-section -->
        <div class="count-down-area count-down-area-sub">
            <section class="count-down-section section-padding parallax" data-speed="7">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center">
                            <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                        </div>
                        <div class="col-12 col-lg-12 text-center">
                            <div class="count-down-clock text-center">
                                <div id="clock">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
        </div>
        <!-- end count-down-section -->
        <!-- product-area start -->
        <div class="product-area product-area-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Best Seller</h2>
                            <img src="{{ url('/forntent') }}/images/section-title.png" alt="">
                        </div>
                    </div>
                </div>
                <ul class="row">
                    @foreach($besl as $value1)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <img src="{{ url('/img/bastseler/').'/'.$value1->product_thumbnail }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $value1->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('/item/bast/seler') }}/{{ $value1->slug }}">{{ $value1->product_name }}</a></h3>
                                    <p class="pull-left">${{ $value1->product_price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Modal area start -->
                        <div class="modal fade" id="exampleModalCenter{{ $value1->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="modal-body d-flex">
                                        <div class="product-single-img w-50">
                                            <img src="{{ url('/img/bastseler/').'/'.$value1->product_thumbnail }}" alt="">
                                        </div>
                                        <div class="product-single-content w-50">
                                            <h3>{{ $value1->product_name }}</h3>
                                            <div class="rating-wrap fix">
                                                <span class="pull-left">${{ $value1->product_price }}</span>
                                                <ul class="rating pull-right">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li>(05 Customar Review)</li>
                                                </ul>
                                            </div>
                                            {{ $value1->product_summary }}
                                            <ul class="input-style">
                                                <li><a href="{{ ('shop') }}">By Product</a></li>
                                            </ul>
                                            <ul class="cetagory">
                                                <li>Categories:</li>
                                                <li><a href="{{ ('shop') }}"> {{ $value1->get_Category->category_name }} </a></li>

                                            </ul>
                                            <ul class="socil-icon">
                                                <li>Share :</li>
                                                @php
                                                    $social = \App\Online::all()->first();
                                                @endphp
                                                <li>Share :</li>
                                                <li><a href="https://www.facebook.com/{{ $social->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://www.twitter.com/{{ $social->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://www.linkedin.com/{{ $social->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="https://www.instagram.com/{{ $social->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="https://www.pinterest.com/{{ $social->pinterest }}"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal area start -->
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- product-area end -->
        <!-- product-area start -->
        <div class="product-area">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Latest Product</h2>
                            <img src="{{ url('/forntent') }}/images/section-title.png" alt="">
                        </div>
                    </div>
                </div>
                <ul class="row">
                    @foreach($list as $key=>$value)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if($key > 3) moreload @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <img src="{{ url('/img/thumbnail/').'/'.$value->product_thumbnail }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $value->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{ route('SingleWishlist',$value->id) }}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href=" {{ route('SingleCart',$value->id) }} "><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href=" {{ url('/item') }}/{{ $value->slug }} ">  {{ $value->product_name   }} </a></h3>
                                    <p class="pull-left">${{ $value->product_price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <!-- Modal area start -->
                        <div class="modal fade" id="exampleModalCenter{{ $value->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="modal-body d-flex">
                                        <div class="product-single-img w-50">
                                            <img src="{{ url('/img/thumbnail/').'/'.$value->product_thumbnail }}" alt="">
                                        </div>
                                        <div class="product-single-content w-50">
                                            <h3>{{ $value->product_name }}</h3>
                                            <div class="rating-wrap fix">
                                                <span class="pull-left">${{ $value->product_price }}</span>
                                                <ul class="rating pull-right">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li>(05 Customar Review)</li>
                                                </ul>
                                            </div>
                                            {{ $value->product_summary }}
                                            <ul class="input-style">
                                                <li class="quantity cart-plus-minus">
                                                    <input type="text" value="1" />
                                                </li>
                                                <li><a href="{{ route('SingleCart',$value->id) }}">Add to Cart</a></li>
                                            </ul>
                                            <ul class="cetagory">
                                                <li>Categories:</li>
                                                <li><a href="{{ ('shop') }}"> {{ $value->get_Category->category_name }} </a></li>

                                            </ul>
                                            <ul class="socil-icon">
                                                <li>Share :</li>
                                                @php
                                                    $social = \App\Online::all()->first();
                                                @endphp
                                                <li>Share :</li>
                                                <li><a href="https://www.facebook.com/{{ $social->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://www.twitter.com/{{ $social->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://www.linkedin.com/{{ $social->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="https://www.instagram.com/{{ $social->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="https://www.pinterest.com/{{ $social->pinterest }}"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal area start -->
                    @endforeach
                    <li class="col-12 text-center">
                        <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- product-area end -->
        <!-- testmonial-area start -->
        <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="test-title text-center">
                            <h2>What Our client Says</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-12">
                        <div class="testmonial-active owl-carousel">
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="{{ url('/forntent') }}/images/test/1.png" alt="">
                                </div>
                            </div>
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="{{ url('/forntent') }}/images/test/1.png" alt="">
                                </div>
                            </div>
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="{{ url('/forntent') }}/images/test/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testmonial-area end -->
    @endsection

