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
								<a href="#">Quản lý danh mục</a>
							</li>
							<li class="active">Danh sách loại sản phẩm </li>
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
								Quản lý danh mục
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Danh sách loại sản phẩm
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
														<th width="3%">ID</th>
														<th width="10%">Tiêu đề</th>
														<th width="42%">Mô tả</th>
														<th width="10%">Ngày cập nhật</th>
														<th width="7%"></th>
													</tr>
												</thead>

												<tbody>
												<form action="{{route('them_danhmuc')}}" method="POST">
													<input type="hidden" name="_token" value="{{csrf_token()}}">
														
													<tr>
														
														<td><input type="text" hidden="true"  name="id" value="{{count($listDM)+1}}" size="1px">
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
													</tr>
												</form>
													@foreach($listDM as $dm)
													<tr onclick="location.href='{{route('danhmuc')}}/chitiet/{{$dm->id}}'">
														<td>{{$dm->id}}</td>
														<td>
															<div ><h4 style="color: #000">{{$dm->name}}</h4></div>
														</td>
														<td>
															<div>{{$dm->description}}</div>
														</td>
														<td>
																@if($dm->updated_at==null)
																	<div>Không xác định...</div>
																	@else 
																	<div>{{$dm->updated_at}}</div> 
																@endif
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">

																<a class="green" href="{{route('danhmuc')}}/suadanhmuc/{{$dm->id}}">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="red"  href="{{route('danhmuc')}}/xoa_danhmuc/{{$dm->id}}">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	
																</a>
															</div>
														</td>
													</tr>
													@endforeach

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