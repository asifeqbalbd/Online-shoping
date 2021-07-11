@extends('backend/master')
    @section('content')
        <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card-box">
                <h4 class="header-title mb-4 text-center text-danger">Add Prodduct Overview</h4>
                <div class="container">
                    <div class="row">
                    <div class="col-8 offset-2">
                        <div class="card bg-primary nb-3" style="margin-top: 50px">
                        <div class="card-header" style="">
                            <div class="card-body">
                            @if(session('session'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Good News! </strong>{{ session('session') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <hr>
                            @endif
                            @if(session('slug'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Good News! </strong>{{ session('slug') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <hr>
                            @endif
                                <form action="{{ url('product-add') }}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="product_name">Product Name:</label>
                                        <input type="text" value="{{ old('product_name') }}" class="form-control @error('product_name') is-invalid @enderror"
                                        id="product_name" placeholder="Enter Product Name" name="product_name" >
                                        @error('product_name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category Name:</label>
                                        <select name="category_id" id="category_id" class=" form-control ">
                                            <option value="">Select One</option>
                                            @foreach ($cat as $value )
                                                <option value=" {{ $value->id }} "> {{ $value->category_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Sub Category Name:</label>
                                        <select name="subcategory_id" id="subcategory_id" class=" form-control ">
                                            <option value="">Select One</option>
                                            @foreach ($subcat as $value )
                                                <option value=" {{ $value->id }} "> {{ $value->subcategory_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_summary">Product Summary:</label>
                                        <textarea type="text" value="{{ old('product_summary') }}" class="form-control @error('product_summary') is-invalid @enderror"
                                        id="product_summary"  name="product_summary" ></textarea>
                                        @error('product_summary')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description">Product Description :</label>
                                        <textarea type="text" value="{{ old('product_description') }}" class="form-control @error('product_description') is-invalid @enderror"
                                        id="product_description"  name="product_description" ></textarea>
                                        @error('product_description')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">Product price :</label>
                                        <input type="text" value="{{ old('product_price') }}" class="form-control @error('product_price') is-invalid @enderror"
                                        id="product_price" placeholder="Ext : 10" name="product_price" >
                                        @error('product_price')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_quantity">Product quantity:</label>
                                        <input type="text" value="{{ old('product_quantity') }}" class="form-control @error('product_quantity') is-invalid @enderror"
                                        id="product_quantity" placeholder="Ext : 10" name="product_quantity" >
                                        @error('product_quantity')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_thumbnail">Product thumbnail:</label>
                                        <input type="file" value="{{ old('product_thumbnail') }}" class="form-control @error('product_thumbnail') is-invalid @enderror"
                                        id="product_thumbnail" name="product_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        @error('product_thumbnail')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_thumbnail">Preview thumbnail:</label>
                                        <img src="" id="blah" alt="Your Img" width="200" height="200">
                                        @error('product_thumbnail')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image_gallery">Image Gallery:</label>
                                        <input type="file" multiple  class="form-control @error('image_gallery') is-invalid @enderror"
                                        id="image_gallery" name="image_gallery[]">
                                        @error('image_gallery')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    @endsection



