@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-danger text-center">Edit Category Overview</h4>
                    <div class="container">
                        <div class="row">
                          <div class="col-8 offset-2">
                            <div class="card bg-primary nb-3" style="margin-top: 50px">
                              <div class="card-header">
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
                                  <form action="{{ url('/category-update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value=" {{ $category -> id }} ">
                                    <div class="form-group">
                                        <label for="category_name">Category Name:</label>
                                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" value=" {{ $category -> category_name }} " placeholder="Enter Name" name="category_name" >
                                        @error('category_name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class=" text-center ">
                                        <button type="submit" class="btn btn-primary">Update</button>
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




