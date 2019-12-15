@extends('layouts.app')

@section('content')
    <div class="row ml-2">
        <div class="col-md-12">
            <h1>Đồ thị sản phẩm</h1>
        </div>
        <div class="col-md-12 mt-3">
            <h6>So sánh chênh lệch sản phẩm:</h6>
            <div id="" class="">
                {!! $chart1->container() !!}
            </div>
            {!! $chart1->script() !!}
            <div id="" class="">
                {!! $chart2->container() !!}
            </div>
            {!! $chart2->script() !!}
        </div>
        <div class="col-md-12">
                <h6>Số lượng đơn hàng theo thể loại</h6>
            <div id="" class="mt-5">
                {!! $chart4->container() !!}
            </div>
            {!! $chart4->script() !!}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
@endsection
