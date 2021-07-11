@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center text-danger">Add Category Overview</h4>
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
                                    <form action="{{ url('/category-add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="category_name">Name:</label>
                                            <input type="text" value="{{ old('category_name') }}" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Enter Caregory Name " name="category_name" >
                                            @error('category_name')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_thumbnail">Category thumbnail:</label>
                                            <input type="file" value="{{ old('category_thumbnail') }}" class="form-control @error('category_thumbnail') is-invalid @enderror"
                                            id="category_thumbnail" name="category_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            @error('category_thumbnail')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_thumbnail">Preview thumbnail:</label>
                                            <img src="" id="blah" alt="Your Img" width="200" height="200">
                                            @error('category_thumbnail')
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



