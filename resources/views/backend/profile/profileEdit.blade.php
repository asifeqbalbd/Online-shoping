@extends('backend/master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4 text-center">Forntent Profile Edit Overview</h4><hr>
                            @if(session('update'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Good News! </strong>{{ session('update') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            <form action="{{ route('ProfilePostUpdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="phone">Phone :</label>
                                    <input type="text" value="{{ $profileE->phone }}" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" placeholder="Enter Phone Number " name="phone">
                                    @error('phone')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email :</label>
                                    <input type="text" value="{{ $profileE->email }}" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Enter Product Name" name="email" >
                                    @error('email')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address"> Address :</label>
                                    <input type="text" value="{{ $profileE->address }}" class="form-control @error('address') is-invalid @enderror"
                                    id="address" placeholder="Enter Product Name" name="address" >
                                    @error('address')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sammary"> Summary :</label>
                                    <textarea type="text" class="form-control @error('sammary')
                                    is-invalid @enderror" id="sammary" placeholder="Enter Caregory Name " name="sammary" >{{ $profileE->sammary }}</textarea>
                                    @error('sammary')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="copyright"> Copy Right :</label>
                                    <textarea type="text" class="form-control @error('copyright')
                                    is-invalid @enderror" id="copyright" placeholder="Enter Caregory Name " name="copyright" >{{ $profileE->copyright }}</textarea>
                                    @error('copyright')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo :</label>
                                    <input type="file" value="{{ $profileE->logo }}" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    @error('product_thumbnail')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Preview Logo :</label>
                                    <img src="{{ url('/img/logo/').'/'.$profileE->logo }}" id="blah" alt="Your Img" width="125" height="65">
                                    @error('logo')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
