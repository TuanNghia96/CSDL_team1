<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Dai Hoc Bach Khoa Ha Noi</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0983567927</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
                    <li><a href="#">Đăng kí</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="/">
                        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> </i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif)<i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            @if(Session::has('cart')) 
                            @foreach($product_cart as $cart)
                            <div class="cart-item">
                            <a class="cart-item-delete" href="{{route('delete_cart',$cart['item']['id'])}}"><i class="fa fa-times"></i></a>
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="{{$cart['item']['image_font']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$cart['item']['name']}}</span>
                                        <span class="cart-item-options">Size:{{$cart['item']['high']}}</span>
                                        <span class="cart-item-amount">SL:{{$cart['qty']}}; <span  style="color:black">Pirce:{{$cart['price']}} VND</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                <div class="clearfix"></div>
                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('ss')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <!--  <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a> -->
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li><a href="product_type.html">Sản phẩm 1</a></li>
                            <li><a href="product_type.html">Sản phẩm 2</a></li>
                            <li><a href="product_type.html">Sản phẩm 4</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="contacts.html">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-bottom -->
</div>