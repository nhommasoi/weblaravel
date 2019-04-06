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
								<a href="#">Quản lý tin</a>
							</li>
							<li class="active">Thêm bài viết</li>
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
								Thêm bài viết

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
								<form class="form-horizontal" role="form" action="{{route('them-bai-viet')}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiêu đề </label>

										<div class="col-sm-9">
											<input type="text" name="title" value="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Chuyên mục </label>

										<div class="col-sm-9">
											<select style="width:15%;" class="chosen-select form-control" id="cat_news" name="cat_news">
												@foreach($cat as $c)
												<option value="{{$c->id}}">{{$c->name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tóm tắt </label>

										<div class="col-sm-9">
											<textarea name="quote" id="quote" cols="10" rows="10" style="margin: 0px; width: 835px; height: 83px;"></textarea>
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Nội dung </label>
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