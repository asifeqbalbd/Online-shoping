@extends('forntent.master')
    @section('title')
        Search Page | A A A Tohoney
    @endsection
    @section('content')
        <!-- .breadcumb-area start -->
        <div class="breadcumb-area bg-img-4 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Shop Page</h2>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><span>Search</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .breadcumb-area end -->
        <!-- product-area start -->
        <div class="product-area pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="product-menu">
                            <ul class="nav justify-content-center">
                                <li>
                                    <a class="active" data-toggle="tab" href="#all">Search product</a>
                                </li>
                                @foreach($cat_shop as $cat)
                                <li>
                                    <a data-toggle="tab" href="#Psi{{ $cat->id }}">{{ $cat->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="all">
                        <ul class="row">
                            @foreach($data as $key => $ps)
                                <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if($key > 7) moreload @endif" >
                                    <div class="product-wrap">
                                        <div class="product-img">
                                            <img src="{{ url('/img/thumbnail/').'/'.$ps->product_thumbnail }}" alt="">
                                            <div class="product-icon flex-style">
                                                <ul>
                                                    <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $ps->id }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="{{ route('SingleCarts',$ps->id) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{ route('SingleProduct', $ps->slug) }}"> {{ $ps->product_name }} </a></h3>
                                            <p class="pull-left">${{ $ps->product_price }}

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
                                <div class="modal fade" id="exampleModalCenter{{ $ps->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="modal-body d-flex">
                                                <div class="product-single-img w-50">
                                                    <img src="{{ url('/img/thumbnail/').'/'.$ps->product_thumbnail }}" alt="">
                                                </div>
                                                <div class="product-single-content w-50">
                                                    <h3>{{ $ps->product_name }}</h3>
                                                    <div class="rating-wrap fix">
                                                        <span class="pull-left">${{ $ps->product_price }}</span>
                                                        <ul class="rating pull-right">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li>(05 Customar Review)</li>
                                                        </ul>
                                                    </div>
                                                    {{ $ps->product_summary }}
                                                    <ul class="input-style">
                                                        <li><a href="{{ route('SingleCarts',$ps->id) }}">Add to Cart</a></li>
                                                    </ul>
                                                    <ul class="cetagory">
                                                        <li>Categories:</li>
                                                        <li><a href="{{ route('shop') }}"> {{ $ps->get_Category->category_name }} </a></li>

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
                            @endforeach
                            <li class="col-12 text-center">
                                <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                            </li>
                        </ul>
                    </div>
                    @foreach($cat_shop as $cat1)
                            <div class="tab-pane" id="Psi{{ $cat1->id }}">
                                <ul class="row">
                                    @foreach(App\Product::where('category_id', $cat1->id)->get() as $items)
                                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <div class="product-wrap">
                                                <div class="product-img">
                                                    <img src="{{ url('/img/thumbnail/').'/'.$items->product_thumbnail }}" alt="">
                                                    <div class="product-icon flex-style">
                                                        <ul>
                                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{ $items->slug }}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                            <li><a href="{{ route('SingleCarts',$items->id) }}"><i class="fa fa-shopping-bag"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="{{ route('SingleProduct', $items->slug) }}"> {{ $items->product_name }} </a></h3>
                                                    <p class="pull-left">${{ $items->product_price }}

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
                                        <div class="modal fade" id="exampleModalCenter{{ $items->slug }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="modal-body d-flex">
                                                        <div class="product-single-img w-50">
                                                            <img src="{{ url('/img/thumbnail/').'/'.$items->product_thumbnail }}" alt="">
                                                        </div>
                                                        <div class="product-single-content w-50">
                                                            <h3>{{ $items->product_name }}</h3>
                                                            <div class="rating-wrap fix">
                                                                <span class="pull-left">${{ $items->product_price }}</span>
                                                                <ul class="rating pull-right">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li>(05 Customar Review)</li>
                                                                </ul>
                                                            </div>
                                                            {{ $items->product_summary }}
                                                            <ul class="input-style">
                                                                <li><a href="{{ route('SingleCarts',$items->id) }}">Add to Cart</a></li>
                                                            </ul>
                                                            <ul class="cetagory">
                                                                <li>Categories:</li>
                                                                <li><a href="{{ route('shop') }}"> {{ $items->get_Category->category_name }} </a></li>

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
                                    @endforeach
                                </ul>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- product-area end -->
    @endsection
