@extends('layouts.app')

@section('content')
    <div class="row ml-2">
        <div class="col-md-12">
            <h1>Đồ thị khách hàng</h1>
        </div>
        <div class="col-md-12 mt-3">
            <h6>Top 3 khách hàng mua 1 hóa đơn nhiều nhất</h6>
            <div id="app" class="">
                {!! $chart1->container() !!}
            </div>
            {!! $chart1->script() !!}
        </div>
        <div class="col-md-12 mt-3">
            <h6>Top 3 kh mua nhiều nhất</h6>
            <div id="app" class="">
                {!! $chart2->container() !!}
            </div>
            {!! $chart2->script() !!}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
@endsection
