@extends('layouts.app')

@section('content')
    <div class="row ml-2">
        <div class="col-md-12">
            <h1>Users Graphs</h1>
        </div>
        <div class="col-md-12 mt-3">
            <h6>Số lượng đơn hàng theo ngày trong một tháng</h6>
            <div id="app" class="">
                {!! $chart1->container() !!}
            </div>
            {!! $chart1->script() !!}
        </div>
        <div class="col-md-12">
            <div id="app" class="mt-5">
                {!! $chart2->container() !!}
            </div>
            {!! $chart2->script() !!}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
@endsection
