@extends("layout.index")
@section("title", "Trang chủ")
@section("content")
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <!-- THE FIRST SLIDE -->
                            @foreach(\App\Models\Product::SLIDE as $sli)
                                <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                                         data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/image/slide/{{$sli}}" data-src="/image/slide/{{$sli}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/image/slide/{{$sli}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
    <div id="ketqua" class="row"></div>
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4><br/>
                            @if($New_Product)
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($New_Product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>                   
                            <div class="row">
                                @foreach($New_Product as $product)
                                    <div class="col-sm-3">
                                        <div class="single-item"  style="padding:10px; margin:5px 0px;">
                                            <div class="single-item-header">
                                                <a href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" style="width:270px; height:270px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$product->name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{$product->price}} VND</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption" style="margin:2px 0px 0px 0px">
                                                <a id="mua" class="add-to-cart pull-left" href="{{route('cart',$product->id)}}" ><i class="fa fa-shopping-cart" data-id="{{$product->id}}"></i></a>
                                                <a class="beta-btn primary" href="{{route('productdetail',$product->id)}}">chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                           
                            @endif
                            <br/>
                        </div>
                        <!-- .beta-products-list -->
                        
                        <div class="space50">&nbsp;</div>
                        
                        <div class="beta-products-list">
                            <h4>Top Products</h4><br/>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($Best_Product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                           @foreach($Best_Product as $top)
                                    <div class="col-sm-3">
                                        <div class="single-item" style="padding:10px; margin:5px 0px;">
                                            <div class="single-item-header">
                                                <a href="{{route('productdetail',$product->id)}}"><img src="{{$top->image_font}}" style="width:270px; height:270px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$top->name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{$top->price}} VND</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption" style="margin:2px 0px 0px 0px">
                                                <a class="add-to-cart pull-left" href="{{route('cart',$top->id)}}"><i class="fa fa-shopping-cart" data-id="{{$top->id}}"></i></a>
                                                <a class="beta-btn primary" href="{{route('productdetail',$top->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                            <div class="row" style="margin:20px 300px;">{{$New_Product->links()}}</div>
                        </div>
                        <!-- .beta-products-list -->
                    </div>
                </div>
                <!-- end section with sidebar and main content -->
            </div>
            <!-- .main-content -->
        </div>
        <!-- #content -->
    </div>
@endsection