@extends("layout.index") 
@section('content')
<div class="container">
    <div id="content" class="row">
        <div class="table-responsive">
            <!-- Shop Products Table -->   
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name">Sản Phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số Lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productcart as $product)
                        <tr class="cart_item">
                            <td class="product-name">
                                <div class="media">
                                    <img class="pull-left" height="40px" width="40px" style="margin-right:10px" src="{{$product['item']['image_font']}}" alt="">
                                    <div class="media-body">
                                        <p class="font-large table-title">{{$product->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount" id="price">{{$product->price}}</span>
                            </td>
                            <td class="product-quantity">
                                <input type="number" id="qty" style="width:40px; height=20px" name="sl" disabled value="{{$product->quantity}}" min="1" data-id="" />
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                    <tfoot>
                    </tfoot>

                </table>
        </div>
        <!-- #content -->
    </div>
    <div id="content">
        <div class="your-order-head"  class="row"><h5>Tổng Tiền:<span id="total_price">{{$totalPrice}}</span></h5></div>
        <div class="your-order-head"  class="row">
            <h5>Hình thức thanh toán</h5><br/>
        </div>

        <div class="your-order-body"  class="row">
                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                    <div class="payment_box payment_method_bacs" style="display: block;">
                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                    </div>
        </div>
        <div class="text-center"><a href="{{route('rediect')}}"><button id ="dathang" type="submit" class="beta-btn primary"> Home <i class="fa fa-chevron-right"></i></button></a></div>
    </div>
</div>
<!-- .container -->
@endsection