@extends('backend/master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Account Overview</h4>
                            @if(session('session'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops! </strong>{{ session('session') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            <form action="{{ route('SocialPost') }}" method="post">
                                @csrf
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-facebook"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror"
                                    id="facebook" placeholder="Enter facebook Username " name="facebook">
                                    @error('facebook')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-twitter"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror"
                                    id="twitter" placeholder="Enter twitter Username " name="twitter">
                                    @error('twitter')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-instagram"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('instagram') }}" class="form-control @error('instagram') is-invalid @enderror"
                                    id="instagram" placeholder="Enter instagram Username " name="instagram">
                                    @error('instagram')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-github"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('github') }}" class="form-control @error('github') is-invalid @enderror"
                                    id="github" placeholder="Enter github Username " name="github">
                                    @error('github')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-pinterest"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('pinterest') }}" class="form-control @error('pinterest') is-invalid @enderror"
                                    id="pinterest" placeholder="Enter pinterest Username " name="pinterest">
                                    @error('pinterest')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-linkedin"></i> </span>
                                    </div>
                                    <input type="text" value="{{ old('linkedin') }}" class="form-control @error('linkedin') is-invalid @enderror"
                                    id="linkedin" placeholder="Enter linkedin Username " name="linkedin">
                                    @error('linkedin')
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
    @endsection
