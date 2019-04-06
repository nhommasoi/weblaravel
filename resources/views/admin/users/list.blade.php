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
								<a href="#">Quản lý tài khoản</a>
							</li>
							<li class="active">Danh sách tài khoản</li>
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
								Quản lý tài khoản
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Danh sách tài khoản >> Có {{count($user)}} tài khoản
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
					  	<style>
					  		button{
					  			background-color: transparent;
					  			background-repeat: no-repeat;
					  			border: none;
					  			overflow: hidden;
					  			outline: none;
					  		}
					  	</style>

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
														<th width="5">ID</th>
														<th width="20%">Họ và tên</th>
														<th width="25%">Địa chỉ Email</th>
														<th width="10%">Mật khẩu</th>
														<th width="10%">Level</th>
														<th width="15%"></th>
													</tr>
												</thead>

												<tbody>
											<!---Add Users------------------------------------------------------>
											<form action="{{route('admin')}}/users/add" method="POST">
												<input type="hidden" name="_token" value="{{csrf_token()}}" />	
													<tr>
														<td></td>

														<td>
															<input type="text" name="fullname" placeholder ="Họ và tên">
														</td>
														<td><input type="text" name="email" placeholder ="Địa chỉ Email"></td>
														<td><input type="password" name="password" placeholder="Nhập mật khẩu"></td>															
														<td>
															<select name="level" id="">
																
																<option value="0">Thành Viên</option>
																<option value="1">Biên tập viên</option>
																<option value="2">Quản trị viên</option>
															</select>
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<input type="submit" name="submit" value="Thêm">
															</div>
														</td>
													</tr>
													</form>		
												@foreach($user as $u)
												<form action="{{route('admin')}}/users/edit/{{$u->id}}" method="POST">
												<input type="hidden" name="_token" value="{{csrf_token()}}" />	
													<tr>
														<td>{{$u->id}}</td>

														<td>
															<input type="text" name="fullname" placeholder ="{{$u->full_name}}">
														</td>
														<td><input type="text" name="email" placeholder ="{{$u->email}}"></td>
														<td><input type="password" name="password" placeholder="Mật khẩu mới"></td>
														<td>
															<select name="level" id="">
																
																<option value="0" @if ($u->level == 0) selected @endif>Thành Viên</option>
																<option value="1" @if ($u->level == 1) selected @endif>Biên tập viên</option>
																<option value="2" @if ($u->level ==  2) selected @endif>Quản trị viên</option>
															</select>
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">

																<button type="submit" name="submit"><i class="ace-icon fa fa-pencil bigger-130"></i></button>

																<a class="red" href="
																{{route('admin')}}/users/delete/{{$u->id}}">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
														</td>
													</tr>
													</form>
												@endforeach											
												</tbody>
											</table>
											{{$user->links()}}
										</div>

									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
@endsection