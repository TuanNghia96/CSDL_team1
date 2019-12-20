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
    <div class="container pl-0 pr-0 " style="max-width: 100%;">
    <div id="ketqua" class="row"></div>
        <div id="content" class="space-top-none pb-0">
            <div class="main-content" style="background:linear-gradient(to bottom, rgb(197,222,234) 0%,rgb(138,187,215) 31%,rgb(6,109,171) 100%);">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4 style="color: #0e0a0a; padding-left: 40px; font-size: 500%;"><b>Sản Phẩm mới</b></h4><br/>
                            @if($New_Product)
                            <form method="POST">
                            <input name="_token" type="hidden" value="{!!csrf_token()!!}}"/>
                            <div class="beta-products-details">
                                <p class="pull-left" style="padding-left:20px"> Tìm thấy {{count($New_Product)}} sản phẩm mới</p>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="row">
                                @foreach($New_Product as $product)
                                    <div class="col-sm-3" style="padding-left:30px; padding-right:30px; padding-bottom:30px">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title" style="color:#00136c; font-weight:bold">{{$product->name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{$product->price}}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption" data-id="5">
                                                <a id="mua" class="add-to-cart pull-left" href="javascript:void(0)" ><i class="fa fa-shopping-cart" data-id="{{$product->id}}"></i></a>
                                                <a class="beta-btn primary" href="{{route('productdetail',$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                              @endforeach
                            </div>
                            </form>
                            @endif
                            <br/>
                        </div>
                        <!-- .beta-products-list -->
                        
                        <div class="space50">&nbsp;</div>
                        
                        <div class="beta-products-list">
                            <h4 style="color: #0e0a0a; padding-left: 40px; font-size: 450%;">Sản phẩm hàng đầu</h4><br/>
                            <div class="beta-products-details">
                                <p class="pull-left" style="padding-left:20px">Tìm thấy {{count($New_Product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                           @foreach($Best_Product as $top)
                                    <div class="col-sm-3" style="padding-left:30px; padding-right:30px; padding-bottom:30px">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{route('productdetail',$product->id)}}"><img src="{{$top->image_font}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title"style="color:#00136c; font-weight:bold">{{$top->name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{$top->price}}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('productdetail',$product->id)}}" >Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                            <div class="row" style="margin:20px 380px;">{{$New_Product->links()}}</div>
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