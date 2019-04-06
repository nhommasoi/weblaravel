	@extends('master')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm :{{$ten_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Loại Sản phẩm </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loaisp as $l_sp)
							<li><a href="{{route('loaisanpham',$l_sp->id)}}">{{$l_sp->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($loaisp)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_loai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
											@if($sp->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale
										</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="sournce/image/product/{{$sp->image}}" alt="" height="240px,with="140px"
											</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price !=0)
													<span class="flash-del">{{$sp->unit_price}}</span>
													<span class="flash-sale">{{$sp->promotion_price}}</span>
													@else


												<span>{{$sp->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
								<div class="row">{{$sp_khac->links()}} </div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>sản phẩm tương tự</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($sp_khac)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $sp_kh)
								<div class="col-sm-4">
									<div class="single-item">
											@if($sp_kh->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale
										</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="sournce/image/product/{{$sp->image}}" alt="" height="260px"
											</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_kh->name}}</p>
											<p class="single-item-price">
												@if($sp_kh->promotion_price !=0)
													<span class="flash-del">{{$sp_kh->unit_price}}</span>
													<span class="flash-sale">{{$sp_kh->promotion_price}}</span>
													@else


												<span>{{$sp_kh->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_kh->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_kh->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{$sp_khac->links()}} </div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> 
					</div>
				</div>


			</div> 
		</div> 
	</div>

	@endsection