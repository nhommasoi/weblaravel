@extends('master')
@section('content')

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $sp_new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($sp_new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale
										</div></div>
										@endif

										<div class="single-item-header">
											<a href="product.html"><img src="sournce/image/product/{{$sp_new->image}}" alt=""height="260px"></a>
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
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							
						</div> <!-- .beta-products-list -->

						 <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->

@endsection