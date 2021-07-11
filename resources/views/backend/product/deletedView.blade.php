@extends('backend/master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4 text-center">Deleted Product Overview</h4>
                            <div class="card-body">
                                @if(session('delete'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Oops! </strong>{{ session('delete') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <hr>
                                @endif
                                @if(session('scRestor'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Yes! </strong>{{ session('scRestor') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <hr>
                                @endif

                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">S-Category Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        @foreach($products as $key => $value)
                                            <tr>
                                                <th> {{ $products->firstItem() + $key}} </th>
                                                <th>{{ $value->product_name }}</th>
                                                <th> {{ $value->get_Category->category_name }} </th>
                                                <th> {{ $value->get_SubCategory->subcategory_name }} </th>
                                                <th>{{ $value->product_price }}</th>
                                                <th>{{ $value->product_quantity }}</th>
                                                <th><img src=" {{ url('/img/thumbnail/').'/'.$value->product_thumbnail }} " width="150px" height="150px" alt=""></th>
                                                <th>
                                                    <a href="{{ url('/productRestor') }}/{{ $value->id }}" class="btn btn-outline-primary ">Restor</a>
                                                    <a href=" {{ url('/product/parmanet/deleted/') }}/{{ $value->id }} " class="btn btn-outline-danger ">Delete</a>
                                                </th>
                                            </tr>
                                        @endforeach

                                    </thead>
                                </table>
                                {{ $products->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
