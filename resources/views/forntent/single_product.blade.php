@extends('forntent/master')
    @section('title')
        Single Product Page | A A A Tohoney
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
                            <li><a href=" {{ url('/') }} ">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{ url('/img/thumbnail/').'/'.$product->product_thumbnail }}" alt="">
                            </div>
                            @foreach(App\Product_image::where('product_id',$product->id)->get() as $images)
                                <div class="item">
                                    <img src=" {{ url('/img/galleyr/').'/'.$images->image_gallery }} " alt="">
                                </div>
                            @endforeach

                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{ url('/img/thumbnail/').'/'.$product->product_thumbnail }}" alt="">
                            </div>
                            @foreach(App\Product_image::where('product_id',$product->id)->get() as $images)
                                <div class="item">
                                    <img src=" {{ url('/img/galleyr/').'/'.$images->image_gallery }} " alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3> {{ $product->product_name }} </h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{ $product->product_price }}</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{ $product->product_summary }}</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" name="product_quantity[]" value="1" />
                            </li>
                            @php
                                $ca = \App\Product::all();
                            @endphp
                            <li><a href="{{ route('SingleCart',$product->id) }}">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="{{ route('shop',$product->get_Category->category_name) }}">{{ $product->get_Category->category_name }}</a></li>
                        </ul>
                        <ul class="socil-icon">
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
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                            <li><a data-toggle="tab" href="#tag">Faq</a></li>
                            <li><a data-toggle="tab" href="#review">Review</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p> {!! nl2br($product->product_description) !!} </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tag">
                            <div class="faq-wrap" id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5><button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">General Inquiries ?</button> </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How To Use ?</button></h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Shipping & Delivery ?</button></h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfour">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">Additional Information ?</button></h5>
                                    </div>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingfive">
                                        <h5><button class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Return Policy ?</button></h5>
                                    </div>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="review-wrap">
                                <ul>
                                    @foreach(\App\Review::where('product_id', $product->id)->get() as $comments)
                                    <li class="review-items">
                                        <div class="review-img">
                                            @php
                                                $user = \App\User::where('email', $comments->email)->first();
                                            @endphp
                                            <img width="103" height="103" style="border-radius: 50%;" src="{{asset('img/user'.'/'.$user->avatar)}}" alt="{{$user->avatar}}">
                                        </div>
                                        <div class="review-content">
                                            <h3><a href="#">{{$comments->name}}</a></h3>
                                            <span>{{$comments->created_at->format('d M Y')}} at {{$comments->created_at->format('H:i A')}}</span>
                                            <p>{{$comments->review}}</p>
                                            <ul class="rating">
                                                @for($i=1; $i<=5; $i++)
                                                    @if($i<=$comments->stars)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @else
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endif
                                                @endfor
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @auth
                                @php
                                    $user_id = \Illuminate\Support\Facades\Auth::user()->id;
                                @endphp
                            @if(\App\Billing::where('user_id', $user_id)->where('product_id', $product->id)->exists())
                                <div class="add-review">
                                <h4>Add A Review</h4>
                                <form action="{{route('review')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="ratting-wrap">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>task</th>
                                                <th>1 Star</th>
                                                <th>2 Star</th>
                                                <th>3 Star</th>
                                                <th>4 Star</th>
                                                <th>5 Star</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>How Many Stars?</td>
                                                <td>
                                                    <input type="radio" name="stars" value="1"/>
                                                </td>
                                                <td>
                                                    <input type="radio" name="stars" value="2"/>
                                                </td>
                                                <td>
                                                    <input type="radio" name="stars" value="3"/>
                                                </td>
                                                <td>
                                                    <input type="radio" name="stars" value="4"/>
                                                </td>
                                                <td>
                                                    <input type="radio" name="stars" value="5" />
                                                </td>
                                            </tr>
                                            <p class="error-message">
                                                @error('stars')
                                                {{$message}}
                                                @enderror
                                            </p>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h4>Name:</h4>
                                            <input type="text" placeholder="Your name here..." name="name"/>
                                            <p class="error-message">
                                                @error('name')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h4>Email:</h4>
                                            <input type="email" placeholder="Your Email here..." name="email" />
                                            <p class="error-message">
                                                @error('email')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <h4>Your Review:</h4>
                                            <textarea name="review" id="massage" cols="30" rows="10" placeholder="Your review here..." ></textarea>
                                            <p class="error-message">
                                                @error('review')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn-style">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                @else
                                <h6>You have to buy this product to put review</h6>
                            @endif
                            @else
                                <h3>Login to put review</h3>
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- featured-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($related_product as $rl_product)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="featured-product-wrap">
                        <div class="featured-product-img">
                            <img src="{{ url('/img/thumbnail/').'/'.$rl_product->product_thumbnail }}" alt="">
                        </div>
                        <div class="featured-product-content">
                            <div class="row">
                                <div class="col-7">
                                    <h3><a href=" {{ route('SingleProduct',$rl_product->slug) }} "> {{ $rl_product->product_name }} </a></h3>
                                    <p>${{ $rl_product->product_price }}</p>
                                </div>
                                <div class="col-5 text-right">
                                    <ul>
                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- featured-product-area end -->
    @endsection
