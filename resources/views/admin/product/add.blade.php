@extends('admin.master')
@section('content')

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="{{route('trang-chu')}}">Home</a>
							</li>

							<li>
								<a href="#">Quản lý sản phẩm</a>
							</li>
							<li class="active">Thêm sản phẩm</li>
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
								Thêm sản phẩm

							</h1>
						</div><!-- /.page-header -->
						<style type="text/css">
							.col-sm-3 {
    							width: 10%;
							}
						</style>
						<div class="row">
							<div class="col-xs-12">
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

								<!-- PAGE CONTENT BEGINS -->
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="{{route('product.add')}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên sản phẩm </label>

										<div class="col-sm-9">
											<input type="text" name="name" value="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá bán </label>

										<div class="col-sm-9">
											<input type="text" name="price" value="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Danh mục </label>

										<div class="col-sm-9">
											<select style="width:15%;" class="chosen-select form-control" id="col" name="col">
												@foreach($col as $c)
												<option value="{{$c->id}}">{{$c->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> URL Ảnh đại diện </label>

										<div class="col-sm-9">
											<input type="text" name="image" value="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mô tả sản phẩm </label>
										<div class="col-sm-9">
								            <textarea name="content" id="content" rows="10" cols="80">
								                
								            </textarea>
								            <script>
								                // Replace the <textarea id="editor1"> with a CKEditor
								                // instance, using default configuration.
								                CKEDITOR.replace( 'content' );
								            </script>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Đăng bài
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Làm mới
											</button>
										</div>
									</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

@endsection

@section('script-head')
<script src="public/assets_admin/js/ckeditor/ckeditor.js" type="text/javascript"></script>
@endsection