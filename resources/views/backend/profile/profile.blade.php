@extends('backend/master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4 text-center">Forntent Overview</h4><hr>
                            @if(session('profile'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Good News! </strong>{{ session('profile') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            <form action="{{ route('ProfilePost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="phone">Phone :</label>
                                    <input type="text" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" placeholder="Enter Phone Number " name="phone" >
                                    @error('phone')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email"> Email :</label>
                                    <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Enter Product Name" name="email" >
                                    @error('email')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address"> Address :</label>
                                    <input type="text" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror"
                                    id="address" placeholder="Enter Product Name" name="address" >
                                    @error('address')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sammary"> Summary :</label>
                                    <textarea type="text" class="form-control @error('sammary')
                                    is-invalid @enderror" id="sammary" placeholder="Enter Caregory Name " name="sammary" ></textarea>
                                    @error('sammary')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="copyright"> Copy Right :</label>
                                    <textarea type="text" class="form-control @error('copyright')
                                    is-invalid @enderror" id="copyright" placeholder="Enter Caregory Name " name="copyright" ></textarea>
                                    @error('copyright')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo :</label>
                                    <input type="file" value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    @error('product_thumbnail')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Preview Logo :</label>
                                    <img src="" id="blah" alt="Your Img" width="200" height="200">
                                    @error('logo')
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
