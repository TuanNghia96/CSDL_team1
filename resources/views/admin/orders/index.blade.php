@extends('layout.index')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <div class="section main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header row">
                        <div class="col-md-12 m5">
                            <h2><a href="{{ route('orders.index') }}">Danh sách đơn hàng</a></h2>
                        </div>
                        <div class="col-md-12 mb-3 mt-3">
                            <a href="{{ route('orders.index', 'status=1') }}" class="btn btn-secondary">Đặt hàng</a>
                            <a href="{{ route('orders.index', 'status=2') }}" class="btn btn-info">Giao hàng</a>
                            <a href="{{ route('orders.index', 'status=3') }}" class="btn btn-success">Đã giao</a>
                            <a href="{{ route('orders.index', 'status=4') }}" class="btn btn-danger">Hủy đơn</a>
                        </div>
                    </div>
                </div>
                
                @if ($orders->count() == 0)
                    <div><h3 class="text-center red">{{ 'Không tìm thấy bản ghi nào.' }}</h3></div>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Tên khách hàng</th>
                            <th class="text-center">Giá trị</th>
                            <th class="text-center">Trang thái</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $value)
                            <tr>
                                <td>{{ $orders->perPage() * ($orders->currentPage() - 1) + $key + 1 }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->total }}</td>
                                <td>{{ $status[$value->status] }}</td>
                                <td>{{  date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                                <td>
                                    <p class="text-center">
                                        <a href="{{ route('orders.show', $value->id) }}">Hiển thị</a>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    
                    </table>
                    <div class="col-md-12">{{ $orders->appends(request()->input())->links() }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection