@extends("layout.index") @section("content")
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img id="anhchinh" src="{{$product->image_font}}"/></br>
                        <img id="anh1" src="{{$product->image_font}}" style="width:80px;height:80px"/>
                        <img id="anh2" src="{{$product->image_back}}" style="width:80px;height:80px"/>
                        <img id="anh3" src="{{$product->image_up}}" style="width:80px;height:80px"/>
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-price">Name: {{$product->name}}</p><br/>
                            <p class="single-item-price">
                                <span>Price: {{$product->price}} VND</span>
                            </p><br/>
                            <p class="single-item-price">Product Type: {{$product->name}}</p><br/>
                            <p class="single-item-price">
                                <span>Size:(Width * Height) 10 * <?php echo 10*$product->size; ?></span>
                            </p><br/>
                            <p class="single-item-price">
                                @if($product->sex) <span>Sex: Nữ</span>
                                @else<span>Sex: Nam</span>
                                @endif
                            </p><br/>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">

                            <a class="add-to-cart" href="{{route('cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs"><span style="margin:15px 0px;">Review<span>
                    <div id="tab" style="display:block;"> 
                        @if(empty($review))
                        <p> No Review</p>
                            @else
                            @foreach($review as $re)
                                <p><strong>{{$re->email}}</strong></p>
                                <p>{{$re->content}}</p>
                                <br/>
                            @endforeach
                        @endif
                        @if($check)
                            <form action="{{route('feedback')}}" method="POST" name="SetReview">
                                @csrf
                                <input type="hidden" name="_token" value="{{!!csrf_token()!!}}"/>
                                <textarea rows="1" cols="1" name="feedback" style="width:100%; height:100px;" id="text"></textarea>
                                <button type="button" id="submit" data-id="{{$product->id}}">Gui</button>
                                <input id="product" type="hidden" name="id_product" value="{{$product->id}}"/>
                                <input id="user" type="hidden" name="id_product" value="{{Auth::id()}}"/>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        @foreach($product_lq as $product)
                        <div class="col-sm-4">
                            <div class="single-item" style="padding:10px; margin:5px 0px;">
                                <div class="single-item-header">
                                    <a href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$product->name}}</p>
                                    <p class="single-item-price">
                                        <span>{{$product->price}}</span>
                                    </p>
                                </div>
                                <div class="single-item-caption" style="margin:2px 0px 0px 0px">
                                    <a class="add-to-cart pull-left" href="{{route('cart',$product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('productdetail',$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h3 class="widget-title">Best_Seller</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($best_product as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
                                <div class="media-body" style="font-size:18px">
                                    {{$product->name}}<br/>
                                    <span class="beta-sales-price" style="font-size:15px">{{$product->price}}VND</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($new_product as $product)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
                                <div class="media-body"style="font-size:18px">
                                    {{$product->name}}<br/>
                                    <span class="beta-sales-price"style="font-size:15px">{{$product->price}} VND</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- .container -->

@endsection