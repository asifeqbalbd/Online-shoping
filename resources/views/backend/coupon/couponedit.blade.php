@extends('backend.master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Coupon Overview</h4>
                            @if(session('cuoponinsert'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Good News! </strong>{{ session('cuoponinsert') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            <form action="{{ route('couponupdate') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="coupon_code">Coupon Code:</label>
                                    <input type="text" value="{{ $couponedit->coupon_code }}" class="form-control @error('coupon_code') is-invalid @enderror"
                                    id="coupon_code" placeholder="Enter Coupon Code" name="coupon_code" >
                                    @error('coupon_code')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="coupon_discount">Coupon Discount:</label>
                                    <input type="text" value="{{ $couponedit->coupon_discount }}" class="form-control @error('coupon_discount') is-invalid @enderror"
                                    id="coupon_discount" placeholder="Enter Coupon Discount" name="coupon_discount" >
                                    @error('coupon_discount')
                                        <div class="alert alert-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="coupon_validity">Coupon Validity:</label>
                                    <input type="date" value="{{ $couponedit->coupon_validity }}" class="form-control @error('coupon_validity') is-invalid @enderror"
                                    id="coupon_validity" placeholder="Enter Product Name" name="coupon_validity" >
                                    @error('product_name')
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
