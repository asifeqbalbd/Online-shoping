@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center text-danger">Profile View Overview</h4>
                    <div class="container">
                        <div class="row">
                          <div class="col-8 offset-2">
                            <div class="card bg-primary nb-3" style="margin-top: 50px">
                              <div class="card">
                                <div class="card-header text-center">

                                </div>
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
                                    @if(session('update'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Yes! </strong>{{ session('update') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <hr>
                                    @endif
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Address</th>
                                                {{--  <th scope="col">Sammary</th>  --}}
                                                <th scope="col">Copy Right</th>
                                                <th scope="col">Logo</th>
                                                {{--  <th scope="col">Time</th>  --}}
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            @foreach($la as $key => $value)
                                                <tr>
                                                    <th> {{ $la->firstItem() + $key}} </th>
                                                    <th> {{ $value->email}} </th>
                                                    <th> {{ $value->phone}} </th>
                                                    <th> {{ $value->address}} </th>
                                                    {{--  <th> {{ $value->sammary}} </th>  --}}
                                                    <th> {{ $value->copyright}} </th>
                                                    <th><img src=" {{ url('/img/logo/').'/'.$value->logo }} " width="125px" height="35px" alt=""></th>
                                                    {{--  <th>{{ $value->created_at == '' ? 'N/A' : $value->created_at->format('Y-M-D') .' ('. $value->created_at->diffForHumans().')'}}</th>  --}}
                                                    <th>
                                                        <a href="{{ url('/profile/post/edit') }}/{{ $value->id }}" class="btn btn-outline-primary ">Edit</a>
                                                        <a href=" {{ url('/profile/post/delete') }}/{{ $value->id }} " class="btn btn-outline-danger ">Delete</a>
                                                    </th>
                                                </tr>
                                            @endforeach

                                        </thead>
                                    </table>
                                    {{ $la->links() }}
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





