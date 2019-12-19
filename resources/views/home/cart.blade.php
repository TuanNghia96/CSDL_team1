@extends("layout.index") 
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('home')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content" class="row">
        <div class="table-responsive">
            <!-- Shop Products Table -->   
            <form method="POST">
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
                    <input name="_token" type="hidden" value="{!!csrf_token()!!}}"/>
                    <input name="cart_id" type="hidden" value="{{$cart_id}}"/>
                        @foreach($productcart as $product)
                        <tr class="cart_item">
                            <td class="product-name">
                                <div class="media">
                                   <a href="{{route('productdetail',$product->id)}}"><img class="pull-left" height="40px" width="40px" style="margin-right:10px" src="{{$product->image_font}}" alt=""></a>
                                    <div class="media-body">
                                        <p class="font-large table-title">{{$product->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount" id="price">{{$product->price}}</span>
                            </td>

                            <td class="product-status">
                                In Stock
                            </td>

                            <td class="product-quantity">
                                <input class ="sl" type="number" id="qty" style="width: 30px;height: 29px;float: left;margin-right: 1px;" name="sl" value="{{$product->quantity}}" min="1" data-id=""/>
                                <button type="button" class="confime" data-id="{{$product->id}}" style="width: 20px;height: 28px;float: left;margin-right: 1px;"><i class="fa fa-pencil" aria-hidden="true" id="quantity"></i></button><span style="float: left;">Update</span>
                            </td>
                            <td class="product-remove">
                                <a href="{{route('delete_cart',[$cart_id,$product->id])}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
                </table>
                <textarea rows="4" cols="10" name="nhanxet" style="width:100%; height:100px;" id="text" placeholder="Nội dung bạn cần thêm cho đơn hàng này"></textarea>
                </form>
        </div>
        <!-- #content -->
    </div>
    <div id="content">
        <div class="your-order-head"  class="row"><h5>Tổng tiền đơn hàng của bạn:<span id="total_price"> {{$totalPrice}}</span> VND</h5></div>
        <div class="your-order-head"  class="row">
            <h5>Hình thức thanh toán</h5><br/>
        </div>

        <div class="your-order-body"  class="row">
            <ul class="payment_methods methods">
                <li class="payment_method_bacs">
                    <div><strong>
                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                        </strong>
                    </div>
                </li>
            </ul>
        </div>
        <div class="text-center"><a id= "kkk" href="javascript:void(0)"><button id ="bbb" type="submit" class="beta-btn primary" data-id={{$cart_id}}> Đặt hàng <i class="fa fa-chevron-right"></i></button></a><a href="{{route('dathang',$cart_id)}}" ><button id="chitiet" type="button" class="beta-btn primary" style="margin:0px 5px; display:none;">Chi Tiet</button></a></div>
    </div>
</div>
<!-- .container -->
@endsection