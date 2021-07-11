@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center text-danger">Add Elider Overview</h4>
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
                                    <form action="{{ url('/slider-add') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="slider_title">Title:</label>
                                            <input type="text" value="{{ old('slider_title') }}" class="form-control @error('slider_title') is-invalid @enderror" id="slider_title" placeholder="Enter Slider Title Name " name="slider_title" >
                                            @error('slider_title')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slider_summary">Slider Summary:</label>
                                            <textarea type="text" class="form-control @error('slider_summary')
                                            is-invalid @enderror" id="slider_summary" placeholder="Enter slider summary Name " name="slider_summary" ></textarea>
                                            @error('slider_summary')
                                                <div class="alert alert-danger"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slider_image">Image:</label>
                                            <input type="file"  class="form-control @error('slider_image') is-invalid @enderror"
                                            id="slider_image" placeholder="Enter Caregory Name " name="slider_image" >
                                            @error('slider_image')
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



