@extends('layouts.app')

@section('title', 'Thông tin người dùng')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Thông tin người dùng</h2>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th scope="col">#</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th scope="col">Tên</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th scope="col">email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th scope="col">avatar</th>
                    <td><img src="{{ asset($user->avata_url) }}" class="img-thumbnail" width="250" height="auto" alt="{{ $user->name }}"></td>
                </tr>
                <tr>
                    <th scope="col">Số điện thoại</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th scope="col">Địa chỉ</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th scope="col">Quyền</th>
                    <td>{{ $user->role }}</td>
                </tr>
                <tr>
                    <th scope="col">trang thái</th>
                    <td>{{ $user->status }}</td>
                </tr>
                <tr>
                    <th scope="col">Ngày khởi tạo</th>
                    <td>{{ date("H:i:s d/m/Y",strtotime($user->created_at)) }}</td>
                </tr>
            </table>
            <h5>Những feedback của người dùng.</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã sản phẩm.</th>
                    <th scope="col">Nội dung.</th>
                    <th scope="col">Thời gian.</th>
                    <th scope="col">Hành động.</th>
                </tr>
                </thead>
                <tbody>
                @if($user->feedbacks()->count())
                    @foreach($user->feedbacks()->get() as $id => $value)
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $value->product_id }}</td>
                            <td>{{ $value->content }}</td>
                            <td>{{ date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                            <td><a href="#">hiện thị</a></td>
                        </tr>
                    @endforeach
                @else
                    <td>Không có phản hồi nào nào</td>
                @endif
                </tbody>
            </table>
            @if($user->role == \App\Models\User::CUSTOMER_ROLE)
                <h5>Những đơn hàng của người dùng.</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thời gian.</th>
                        <th scope="col">Thanh toán.</th>
                        <th scope="col">Trạng thái.</th>
                        <th scope="col">Hành động.</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($user->orders()->count())
                        @foreach($user->orders()->get() as $id => $value)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                                <td>{{ $value->total }}</td>
                                <td>{{ \App\Models\Order::$status[$value->status] }}</td>
                                <td><a href="{{ route('orders.show', $value->id) }}">hiện thị</a></td>
                            </tr>
                        @endforeach
                    @else
                        <td rowspan="4">Không có đơn hàng nào</td>
                    @endif
                    </tbody>
                </table>
            @endif
    </div>
@endsection
