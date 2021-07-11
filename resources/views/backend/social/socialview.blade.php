@extends('backend/master')
    @section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-4">Account Overview</h4>
                            @if(session('update'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops! </strong>{{ session('update') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            @if(session('delete'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops! </strong>{{ session('delete') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <hr>
                            @endif
                            <center>
                                <table class="table table-bordered table-responsive" >
                                    <thead>
                                        <tr>
                                            <td><i class="fa fa-list"></i></td>
                                            <td><i class="fa fa-facebook"></i></td>
                                            <td><i class="fa fa-twitter"></i></td>
                                            <td><i class="fa fa-instagram"></i></td>
                                            <td><i class="fa fa-github"></i></td>
                                            <td><i class="fa fa-pinterest"></i></td>
                                            <td><i class="fa fa-linkedin"></i></td>
                                            <td><i class="fa fa-ambulance"></i></td>
                                        </tr>
                                    </thead>
                                    <thead>
                                        @foreach($viewOnline as $key => $value)
                                        <tr>
                                            <th> {{ $viewOnline->firstItem() + $key}} </th>
                                            <td> {{ $value->facebook }} </td>
                                            <td> {{ $value->twitter }} </td>
                                            <td> {{ $value->instagram }} </td>
                                            <td> {{ $value->github }} </td>
                                            <td> {{ $value->pinterest }} </td>
                                            <td> {{ $value->linkedin }} </td>
                                            <td>
                                                <a href="{{ url('/socialpostedit') }}/{{ $value->id }}" class="btn btn-outline-primary">Edit</a>
                                                <a href="{{ url('/Social/post/delete') }}/{{ $value->id }}" class="btn btn-outline-danger ">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </thead>
                                </table>
                            </center>
                            {{ $viewOnline->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
