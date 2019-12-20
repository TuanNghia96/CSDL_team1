@extends("layout.index")
@section("content")
<div class="container pl-0 pr-0 " style="margin-right: 0px;margin-left: 0px;">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($category as $cate)
							<li><a href="{{route('category',$cate->id)}}">{{$cate->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product_category)}} styles found </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($product_category as $product)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}} </p>
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
							<div class="row">{{$product_category->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Seller</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($best_product)}} styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($best_product as $product)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('productdetail',$product->id)}}"><img src="{{$product->image_font}}" alt=""></a>
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
							<div class="row">{{$best_product->links()}}</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection