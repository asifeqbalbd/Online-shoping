@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center text-danger">Category View Overview</h4>
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
                                                <th scope="col"> Name</th>
                                                <th scope="col"> Subject</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            @foreach($messageview as $key => $value)
                                                <tr>
                                                    <th> {{ $messageview->firstItem() + $key}} </th>
                                                    <th> {{ $value->name  ?? N/A}} </th>
                                                    <th> {{ $value->subject  ?? N/A}} </th>
                                                    <th> {{ $value->msg ?? N/A}} </th>
                                                    <th>{{ $value->created_at == '' ? 'N/A' : $value->created_at->format('Y-M-D') .' ('. $value->created_at->diffForHumans().')'}}</th>
                                                    <th>
                                                        <a href=" {{ url('Message/delete') }}/{{ $value->id }} " class="btn btn-outline-danger ">Delete</a>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </thead>
                                    </table>
                                    {{ $messageview->links() }}
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





