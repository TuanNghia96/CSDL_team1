@extends("layout.index") @section("content")
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img id="anhchinh" src="assets/dest/images/lena.jpg"/></br>
                        <img id="anh1" src="assets/dest/images/lena.jpg" style="width:80px;height:80px"/>
                        <img id="anh2" src="assets/dest/images/lena.jpg" style="width:80px;height:80px"/>
                        <img id="anh3" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/160811_%EB%AA%A8%EB%AA%A8%EB%9E%9C%EB%93%9C_%EC%83%81%EC%95%94_%ED%99%8D%EB%B3%B4._%EB%82%B8%EC%8B%9C_29_pic_%283%29.png" style="width:80px;height:80px"/>
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-price">Name: {{$product->name}}</p><br/>
                            <p class="single-item-price">
                                <span>Price: {{$product->price}} VND</span>
                            </p><br/>
                            <p class="single-item-price">Product Type: {{$producttype->name}}</p><br/>
                            <p class="single-item-price">
                                <span>Size:10* <?php echo 10*$product->size; ?></span>
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
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li id="review">Reviews {{count($review)}}</li>
                    </ul>
                    <div id="tab" style="display:none;"> 
                        @if(empty($review))
                        <p> No Review</p>
                            @else 
                            @foreach($review as $re)
                                <p><strong>{{$re->email}}</strong></p>
                                <p>{{$re->content}}</p>
                                <br/>
                            @endforeach 
                        @endif
                        <form action="{{route('feedback')}}" method="POST">
                            @csrf
                            <textarea rows="1" cols="1" name="feedback" style="width:100%; height:100px;" id="text"></textarea>
                            <button type="submit" id="submit" data-id="{{$product->id}}">Gui</button>
                            <input type="hidden" name="id_product" value="{{$product->id}}"/>
                        </form>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        @foreach($product_lq as $product)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('productdetail',$product->id)}}"><img src="assets/dest/images/lena.jpg" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$product->name}}</p>
                                    <p class="single-item-price">
                                        <span>{{$product->price}}</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
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
                                <a class="pull-left" href="{{route('productdetail',$product->id)}}"><img src="assets/dest/images/lena.jpg" alt=""></a>
                                <div class="media-body">
                                    {{$product->name}}
                                    <span class="beta-sales-price">{{$product->price}} VND</span>
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
                                <a class="pull-left" href="{{route('productdetail',$product->id)}}"><img src="assets/dest/images/lena.jpg" alt=""></a>
                                <div class="media-body">
                                    {{$product->name}}
                                    <span class="beta-sales-price">{{$product->price}} VND</span>
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