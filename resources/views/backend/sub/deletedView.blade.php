@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center text-danger">Deleted Sub Category Overview (Total : {{ $sdl }})</h4>
                    <div class="card-body">
                        @if(session('delete'))
                            <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                                <strong>Oops! </strong>{{ session('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <hr>
                        @endif
                        @if(session('scRestor'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Yes! </strong>{{ session('scRestor') }}
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
                                @forelse($subregd as $key => $value)
                                    <tr>
                                        <th> {{ $subregd->firstItem() + $key}} </th>
                                        <th>{{ $value->subcategory_name }}</th>
                                        <th> {{ $value->category_id }} </th>
                                        <th>{{ $value->created_at == '' ? 'N/A' : $value->created_at->format('Y-M-D') .' ('. $value->created_at->diffForHumans().')'}}</th>
                                        <th>
                                            <a href="{{ url('/subcategorydeletedRestor') }}/{{ $value->id }}" class="btn btn-outline-success ">Restor</a>
                                            <a href=" {{ url('/subcategoryparmanetdeleted') }}/{{ $value->id }} " class="btn btn-outline-danger ">P Delete</a>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="30" class=" text-center ">No Data</td>
                                    </tr>
                                @endforelse
                            </thead>
                        </table>
                        {{ $subregd->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

