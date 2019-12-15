@extends('layouts.app')

@section('title', 'Thông tin sản phầm')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Thông tin sản phầm</h2>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th scope="col">#</th>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <th scope="col">Tên</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th scope="col">ảnh trước</th>
                    <td><img src="{{ $product->image_font }}" class="img-thumbnail" width="250" height="auto" alt="{{ $product->name }}"></td>
                </tr>
                <tr>
                    <th scope="col">ảnh sau</th>
                    <td><img src="{{ $product->	image_back }}" class="img-thumbnail" width="250" height="auto" alt="{{ $product->name }}"></td>
                </tr>
                <tr>
                    <th scope="col">ảnh trên</th>
                    <td><img src="{{ $product->image_up }}" class="img-thumbnail" width="250" height="auto" alt="{{ $product->name }}"></td>
                </tr>
                <tr>
                    <th scope="col">Giới tính</th>
                    <td>{{ \App\Models\Product::$sex[$product->sex]  }}</td>
                </tr>
                <tr>
                    <th scope="col">Giá tiền</th>
                    <td>{{ number_format($product->price) }} đ</td>
                </tr>
                <tr>
                    <th scope="col">Thể loại</th>
                    <td>{{ $product->category->name }}</td>
                </tr>
                <tr>
                    <th scope="col">Kích cỡ(h x w)</th>
                    <td>{{ 10 * $product->size }} x 10</td>
                </tr>
                <tr>
                    <th scope="col">Đã bán</th>
                    <td>{{ $product->bought }}</td>
                </tr>
                <tr>
                    <th scope="col">trang thái</th>
                    <td>@if (($product->status) == 0)Ngừng bán @else Kinh doanh @endif</td>
                </tr>
                <tr>
                    <th scope="col">Ngày khởi tạo</th>
                    <td>{{ date("H:i:s d/m/Y",strtotime($product->created_at)) }}</td>
                </tr>
            </table>
            </table>
            <h5>Những đơn hàng của sản phẩm.</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Đơn hàng số.</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Số lượng</th>
                </tr>
                </thead>
                <tbody>
                @if($product->feedbacks()->count())
                    @foreach($product->orderDetails()->get() as $id => $value)
                        <tr>
                            <td>{{ $id }}</td>
                            <td><a href="{{ route('orders.show', $value->order->id) }}">{{ $value->order->id }}</a></td>
                            <td><a href="{{ route('users.show', $value->order->user_id) }}">{{ $value->order->user->name }}</a></td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ date("H:i:s d/m/Y",strtotime($value->order->created_at)) }}</td>
                        </tr>
                    @endforeach
                @else
                    <td>Không có phản hồi nào nào</td>
                @endif
                </tbody>
            </table>
            {{--list feedback--}}
            <h5>Những feedback của sản phẩm.</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã sản phẩm.</th>
                    <th scope="col">Nội dung.</th>
                    <th scope="col">Thời gian.</th>
                </tr>
                </thead>
                <tbody>
                @if($product->feedbacks()->count())
                    @foreach($product->feedbacks()->get() as $id => $value)
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $value->product_id }}</td>
                            <td>{{ $value->content }}</td>
                            <td>{{ date("H:i:s d/m/Y",strtotime($value->created_at)) }}</td>
                        </tr>
                    @endforeach
                @else
                    <td>Không có phản hồi nào nào</td>
                @endif
                </tbody>
            </table>
    </div>
@endsection
