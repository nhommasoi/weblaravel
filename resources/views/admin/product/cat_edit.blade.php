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
								<a href="{{route('danhmuc')}}">Quản lý loại sản phẩm</a>
							</li>
							<li class="active">Sửa </li>
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
								Sửa Loại Sản Phẩm

							</h1>
						</div><!-- /.page-header -->
						<style type="text/css">
							.col-sm-3 {
    							width: 10%;
							}
						</style>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							@if(count($errors) > 0)
								@foreach($errors->all() as $err)
									<div class="alert alert-warning">
								    <strong>Warning!</strong> {{$err}}
								 	 </div>
								@endforeach
							@endif
							@if(session('thongbao'))
							  <div class="alert alert-success">
							    <strong>Success!</strong> {{session('thongbao')}}.
							  </div>
							@endif	
								<form class="form-horizontal" role="form" action="{{route('danhmuc')}}/sua_danhmuc/{{$id}}" method="GET">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên loại </label>

										<div class="col-sm-10">
											<input type="text" id="ten" name="name" value="{{$dmz->name}}" class="col-xs-10 col-sm-10"  />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mô tả </label>

										<div class="col-sm-10">
											<textarea rows="8" cols="90" required="true" id="ten" name="description"   class="col-xs-10 col-sm-10">{{$dmz->description}}</textarea>
										</div>
										</div>
									<div class="space-4"></div>


									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Cập nhật
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Làm lại
											</button>
										</div>
									</div>
								</form>
							
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

@endsection