@extends("layout.index") 
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
<form action=# method="post">
    <div id="content" class="row">
        <div class="table-responsive">
            <!-- Shop Products Table -->   
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name">Sản Phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-status">Trạng Thái</th>
                            <th class="product-quantity">Số Lượng</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::has('cart')) @foreach($product_cart as $product)
                        <tr class="cart_item">
                            <td class="product-name">
                                <div class="media">
                                    <img class="pull-left" height="40px" width="40px" style="margin-right:10px" src="{{$product['item']['image_font']}}" alt="">
                                    <div class="media-body">
                                        <p class="font-large table-title">{{$product['item']['name']}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount" id="price">{{$product['item']['price']}}</span>
                            </td>

                            <td class="product-status">
                                In Stock
                            </td>

                            <td class="product-quantity">
                                <input type="number" id="qty" style="width:40px; height=20px" name="sl" value="{{$product['qty']}}" min="1" max="10" data-id= {{ $product['item']['id'] }} />
                            </td    >
                            <td class="product-remove">
                                <a href="{{route('delete_cart',$product['item']['id'])}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
        </div>
        <!-- #content -->
    </div>
    <div id="content">
        <div class="your-order-head"  class="row"><h5>Tổng Tiền:<span id="total_price"></span></h5></div>
        <div class="your-order-head"  class="row">
            <h5>Hình thức thanh toán</h5><br/>
        </div>

        <div class="your-order-body"  class="row">
            <ul class="payment_methods methods">
                <li class="payment_method_bacs">
                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                    <div class="payment_box payment_method_bacs" style="display: block;">
                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                    </div>
                </li>

                <li class="payment_method_cheque">
                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                    <label for="payment_method_cheque">Chuyển khoản </label>
                    <div class="payment_box payment_method_cheque" style="display: none;">
                        Chuyển tiền đến tài khoản sau:
                        <br>- Số tài khoản: 123 456 789
                        <br>- Chủ TK: Nguyễn A
                        <br>- Ngân hàng ACB, Chi nhánh Ha Noi
                    </div>
                </li>

            </ul>
        </div>
        <div class="text-center"><button type="submit" class="beta-btn primary" href="{{route('dathang')}}">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
    </div>
    </form>
</div>
<!-- .container -->
@endsection