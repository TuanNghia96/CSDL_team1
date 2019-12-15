<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản thành công.</title>
</head>
<body>
<h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
    <a href="http://127.0.0.1:8000">Visit Our Website</a>
</h2>
<p>Xin chào {{ $order->user->name }}</p>
@if($reason)
    <p class="text-danger">Đơn hàng của bạn đã bị hủy.</p>
    <p><b>Lí do:</b>{{ $reason }}</p>
@else
    <p>Đơn hàng của bạn đang được xử lý.</p>
@endif
<strong>Cảm ơn vì đã sử dụng.</strong>
<table class="table">
    <tbody>
    <tr>
        <th>Tên khách hàng:</th>
        <td>{{ $order->user->name }}</td>
    </tr>
    <tr>
        <th>Số điện thoại:</th>
        <td>{{ $order->user->phone }}</td>
    </tr>
    <tr>
        <th>Địa chỉ:</th>
        <td>{{ $order->user->address }}</td>
    </tr>
    <tr>
        <th>Ghi chú</th>
        <td>{{ $order->memo }}</td>
    </tr>
    <tr>
        <th>Trạng thái:</th>
        <td>{{ $status[$order->status] }}</td>
    </tr>
    <tr>
        <th>Ngày mua:</th>
        <td>{{ $order->created_at }}</td>
    </tr>
    </tbody>
</table>
<div>
    <h4>Đơn hàng chi tiết</h4>
</div>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">Số lượng</th>
        <th class="text-center">Giá tiền</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->ordersDetail()->get() as $key => $value)
        <tr>
            @php($product = $value->product)
            <td>{{ $key }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $value->quantity }}</td>
            <td class="text-right">{{ $value->quantity * $product->price }} đ</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" class="text-right"><h4>Thanh toán:</h4></td>
        <td class="text-right"><h4><b>{{ $order->total }} đ</b></h4></td>
    </tr>
    </tbody>
</table>
</body>
</html>
