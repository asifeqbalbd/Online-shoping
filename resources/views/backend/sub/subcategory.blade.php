@extends('backend/master')
    @section('content')
        <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card-box">
                <h4 class="header-title mb-4 text-center text-danger">Add Sub Category Overview</h4>
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
                                <form action="{{ url('subcategory-add') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="subcategory_name">Sub Category Name:</label>
                                        <input type="text" value="{{ old('subcategory_name') }}" class="form-control @error('subcategory_name') is-invalid @enderror" id="subcategory_name" placeholder="Enter Name" name="subcategory_name" >
                                        @error('subcategory_name')
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



