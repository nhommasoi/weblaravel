@extends('admin.master')
@section('content')
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="{{route('admin')}}">Home</a>
							</li>

							<li>
								<a href="{{route('donhang')}}">Quản lý đơn hàng</a>
							</li>
							<li class="active">Danh sách đơn hàng</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						@include('admin.layout.settings_layout')

						<div class="page-header">
							<h1>
								Quản lý đơn hàng
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Danh sách đơn hàng
								</small>
							</h1>
						</div><!-- /.page-header -->

						@if(count($errors) > 0)
						@foreach($errors->all() as $err)
							<div class="alert alert-warning">
							    <strong>Cảnh báo!</strong> {{$err}}
						 	 </div>
						@endforeach
						@endif
						
						@if(session('thongbao'))
						  <div class="alert alert-success">
						    <strong>Thành công!</strong> {{session('thongbao')}}.
						  </div>
					  	@endif

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th width="7%">Đơn số</th>
														<th width="27%">Mặt hàng</th>
														<th width="13%">Hình ảnh</th>
														<th width="7%">Số lượng</th>
														<th width="10%">Đơn giá</th>
														<th width="15%">Thành tiền</th>
														<th width="20%">Ngày đặt</th>
													</tr>
												</thead>

												<tbody>
												<!--<form action="" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
														
													<tr>
														
														<td><input type="text" hidden="true"  name="id" value="{{count($listDH_chitiet)+1}}" size="1px">
														</td>

														<td>
															<input type="text" name="cat_name" placeholder="Tên Loại Bánh">
														</td>
														<td >
															<input type="text" name="description" placeholder="Mô tả" size="50%">
														</td>
														<td>
														
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<input type="submit" name="submit" value="Thêm >>">
															</div>
														</td>
													</tr>-->
												</form>
													@foreach($listDH_chitiet as $a=>$dh)
													
													<tr>
														<td >{{$dh->id_bill}}</td>
														<td >{{$url_img[$a]->name}}</td>
														<td>
															<div ><img src="sournce/image/product/{{$url_img[$a]->image}}" width="150px" height="100px"></div>
														</td>
														<td align="center"><div>{{$dh->quantity}}</div></td>
														<td><div>{{$dh->unit_price}}</div></td>
														<td>
															<div><b>{{$dh->unit_price*$dh->quantity}}</b> </div> 
														</td>
														<td>
															<div >

																@if($dh->updated_at==null)
																	<div>Không xác định...</div>
																	@else 
																	<div>{{$dh->updated_at}}</div> 
																@endif
															</div>
															<div>
														</td>
													</tr>
													@endforeach

													<tr>
														<thead>
														<th colspan="4" style="color: #000">
															TỔNG CHI PHÍ THANH TOÁN
															
														</th>
														<th colspan="3" style="color: #000">
															THÔNG TIN KHÁCH HÀNG
														</th>
													</thead>
													</tr>
													
													<tr>
														<td colspan="4"><h3 style="color: red" align="center">
															
															{{$bill->total}}đ</h3></td>
														<td>{{$khach_hang->name}} ({{$khach_hang->gender}})</td>
														<td colspan="2"><b>[Email:]</b>	&#32;	&#32; {{$khach_hang->email}}<br>
														<b>[Địa chỉ:]</b>	&#32;	&#32;  {{$khach_hang->address}}<br>
														<b>[Sdt:]</b>	&#32;	&#32;	 {{$khach_hang->phone_number}}</td>
													</tr>

												</tbody>
											</table>
											{{-- <div class="row">{{$listDM->links()}} </div>--}}
										</div>
									</div>
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
@endsection
@section('script-1')
    <script src="public/assets_admin/js/bootbox.js"></script>
    <script>
		$(document).on("click", "[data-toggle=\"confirm\"]", function (e) {
		    e.preventDefault();
		    var lHref = $(this).attr('href');
		    var lText = this.attributes.getNamedItem("data-title") ? this.attributes.getNamedItem("data-title").value : "Bạn có chắc chắn muốn xóa?"; // If data-title is not set use default text
		    bootbox.confirm(lText, function (confirmed) {
		        if (confirmed) {
		            //window.location.replace(lHref); // similar behavior as an HTTP redirect (DOESN'T increment browser history)
		            window.location.href = lHref; // similar behavior as clicking on a link (Increments browser history)
		        }
		    });
		});
    </script>
    
@endsection