	@extends('master')
	@section('content')
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
					zz	<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" 
									class="active-revslide" style="width: 100%; height: 100%;
									 overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;
						            " data-duration="undefined" data-zoomstart="undefined" 
						            data-zoomend="undefined" data-rotationstart="undefined" 
						            data-rotationend="undefined" data-ease="undefined" 
						            data-bgpositionend="undefined" data-bgposition="undefined"
						             data-kenburns="undefined" data-easeme="undefined" 
						             data-bgfit="undefined" data-bgfitend="undefined" 
						             data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" 
													data-lazyload="undefined" data-bgfit="cover"
													 data-bgposition="center center" 
													 data-bgrepeat="no-repeat" data-lazydone="undefined"
													  src="sournce/image/slide/{{$sl->image}}"
													   data-src="sournce/image/slide/{{$sl->image}}" 
													   style="background-color: rgba(0, 0, 0, 0); 
													   background-repeat: no-repeat; background-image:
													    url('sournce/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								

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
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $sp_new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($sp_new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale
										</div></div>
										@endif

										<div class="single-item-header"> 
											<a href="{{route('chitietsanpham',$sp_new->id)}}"><img src="sournce/image/product/{{$sp_new->image}}" alt=""height="260px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_new->name}}</p>
											<p class="single-item-price">
												@if($sp_new->promotion_price==0)
													<span class="flash-del">{{number_format($sp_new->unit_price)}}đ</span>
												@else
													<span class="flash-del">{{$sp_new->unit_price}}</span>
													<span class="flash-sale">{{$sp_new->promotion_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route(
											'themgiohang',$sp_new->id)}}">
											<i class="fa fa-shopping-cart"></i></a>

											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div class="row">{{$new_product->links()}} </div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mại</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($sp_khuyenmai)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khuyenmai as $sp_km)
								<div class="col-sm-3">
									<div class="single-item">
										@if($sp_km->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif

										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp_new->id)}}"><img src="sournce/image/product/{{$sp_km->image}}" alt=""height="260px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_km->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$sp_km->unit_price}}</span>
													<span class="flash-sale">{{$sp_km->promotion_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_km->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="

												{{route('chitietsanpham',$sp_new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$new_product->links()}} </div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->

	@endsection