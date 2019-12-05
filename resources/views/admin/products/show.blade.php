@extends('layout.index')

@section('title', 'Thông tin người dùng')

@section('content')
    <div class="section main">
        <div class="container">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Thông tin người dùng</h2>
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
        </div>
    </div>
@endsection