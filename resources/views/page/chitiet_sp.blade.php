		@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}} </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="sournce/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$sanpham->name}}</p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
													<span class="flash-del">{{number_format($sanpham->unit_price)}}đ</span>
												@else
									<span class="flash-del">{{$sanpham->unit_price}}</span>
									<span class="flash-sale">{{$sanpham->promotion_price}}</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Tùy Chọn :</p>
							<div class="single-item-options">
							
								<select class="wc-select" name="color">
									<option>Số Lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả </a></li>
							<li><a href="#tab-reviews">nhận xét (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
					<p>{{$sanpham->description}}</p> 
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sp_tuongtu as $tt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="sournce/image/product/{{$tt->image}}" alt="" height="160px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$tt->name}}</p>
										<p class="single-item-price">
											@if($tt->promotion_price==0)
													<span class="flash-del">{{number_format($tt->unit_price)}}đ</span>
												@else

											<span class="flash-del">{{$tt->unit_price}}</span>
													<span class="flash-sale">{{$tt->promotion_price}}</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$tt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('themgiohang',$tt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
							<div class="row">{{$sp_tuongtu->links()}} </div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_banchay as $sp_banchay)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$sanpham->id)}}"><img src="sournce/image/product/{{$sp_banchay->image}}" alt=""></a>
									<div class="media-body">
										{{$sp_banchay->name}}
										<span class="beta-sales-price">{{$sp_banchay->unit_price}}</span>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_moinhat as $sp_moi)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$sanpham->id)}}"><img src="sournce/image/product/{{$sp_moi->image}}" alt=""></a>
									<div class="media-body">
										{{$sp_moi->name}}
										<span class="beta-sales-price">{{$sp_moi->unit_price}}</span>
									</div>
								</div>
									@endforeach
							
								</div>
							</div>
						</div>

					</div> 
				</div>
			</div>
		</div> 
	</div> 
	@endsection