@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center">Sub Category Overview (Totla : {{ $sl }})</h4>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Sub Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <thead>
                                 @foreach($subcat as $key => $value)
                                    <tr>
                                        <th> {{ $subcat->firstItem() + $key}} </th>
                                        <th>{{ $value->subcategory_name }}</th>
                                        <th> {{ $value->get_reg->category_name }} </th>
                                        <th>{{ $value->created_at == '' ? 'N/A' : $value->created_at->format('Y-M-D') .' ('. $value->created_at->diffForHumans().')'}}</th>
                                        <th>
                                            <a href=" {{ url('/subcategoryedit') }}/{{ $value->id }} " class="btn btn-outline-primary ">Edit</a>
                                            <a href=" {{ url('/subcategorydelete') }}/{{ $value->id }} " class="btn btn-outline-danger ">Delete</a>
                                        </th>
                                    </tr>
                                @endforeach

                            </thead>
                        </table>
                        {{ $subcat->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
