@extends('backend/master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4">Account Overview</h4>
                    {!! $chart->container() !!}
                        <script src="//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                    {!! $chart->script() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_js')

@endsection
