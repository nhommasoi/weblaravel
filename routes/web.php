<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('admin',[
	'as'=>'admin',
	'uses'=>'Controller@postLoginAdmin'

	]);
Route::post('admin',[
	'as'=>'admin',
	'uses'=>'Controller@postLoginAdmin'

	]);
Route::get('lg',[
	'as'=>'lg',
	'uses'=>'Controller@getLg'
]);
//Route::get('danhmuc',[
//	'as'=>'danhmuc',
//	'uses'=>'Controller@getListDanhMuc'
//	]
//);
/////////////////////////////DANH MUC SAN PHAM/////////////////////////////////
Route::get('danhmuc',[
	'as'=>'danhmuc',

	'uses'=>'Controller@getListDanhMuc'
	]
);
Route::post('them_danhmuc',[
	'as'=>'them_danhmuc',
	'uses'=>'Controller@addListDanhMuc'
	]
);
Route::get('danhmuc/xoa_danhmuc/{id}','Controller@delListDanhMuc');
Route::get('danhmuc/suadanhmuc/{id}',[
	'as'=>'danhmuc/suadanhmuc',
	'uses'=>'Controller@suaDanhMuc'
	]
);
Route::get('danhmuc/sua_danhmuc/{id}','Controller@suaListDanhMuc');
Route::get('danhmuc/chitiet/{id}','Controller@chitietListDanhMuc');
//---------------------------------DON HANG-----------------------------------------//
Route::get('donhang',[
	'as'=>'donhang',
	'uses'=>'Controller@getListDonHang'
	]
);
Route::get('donhang/chitiet/{id}',[
	'as'=>'donhang/chitiet',
	'uses'=>'Controller@getChitietDonHang'
	]
);
//---------------------------------DON HANG-----------------------------------------//
//////////////////////////////DANH MUC SAN PHAM///////////////////////////////////
Route::get('sanpham',[
	'as'=>'sanpham',

	'uses'=>'Controller@getListSanpham'
	]
);
Route::get('delete/{name}',
'Controller@getProductDel'
);

//saddddssssssssssssssssssssss 111111111111111111111111111111111111111111111111111111
//saddddssssssssssssssssssssss 111111111111111111111111111111111111111111111111111111
Route::get('',[
	'as'=>'trang-chu',
	'uses'=>'Controller@getIndex'

	]);
Route::get('loai-san-pham/{type}',
	[
	'as'=>'loaisanpham',
	'uses'=>'Controller@getLoaiSp'


	]);
Route::get('chi-tiet-san-pham/{id}',
	[
	'as'=>'chitietsanpham',
	'uses'=>'Controller@getChiTietSp'


	]);
Route::get('gioi-thieu',
	[
	'as'=>'gioithieu',
	'uses'=>'Controller@getGioiThieu'


	]);

Route::get('lien-he',
	[
	'as'=>'lienhe',
	'uses'=>'Controller@getLienHe'


	]);
Route::get('search',[
	'as'=>'search',
	'uses'=>'Controller@getSearch'

	]);
Route::get('tintuc',[
		'as'=>'tintuc',
		'uses'=>'Controller@getTinTuc'
]);
Route::get('dangnhap',[
	'as'=>'dang-nhap',
	'uses'=>'Controller@getLogin'

	]);
Route::post('dangnhap',[
	'as'=>'dang-nhap',
	'uses'=>'Controller@postLogin'

	]);
Route::get('dangki',[
	'as'=>'dang-ki',
	'uses'=>'Controller@getSignup'

]);
Route::post('dangki',[
'as'=>'dang-ki',
'uses'=>'Controller@postSignup'
]);
Route::get('add-cart/{id}',[
'as'=>'themgiohang',
'uses'=>'Controller@getAddCart'
]);
Route::get('del-cart/{id}',[
'as'=>'xoagiohang',
'uses'=>'Controller@getDelCart'

]);
Route::get('dat-hang',[
'as'=>'dathang',
'uses'=>'Controller@getDatHang'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'Controller@postDatHang'

]);
Route::get('dang-xuat',[

	'as'=>'dangxuat',
	'uses'=>'Controller@postDangXuat'
]);
Route::get('all-cart',[
	'as'=>'all-cart',
	'uses'=>'Controller@getAllCart'
]);
Route::get('text-s',[
'as'=>'text-s',
'uses'=>'Controller@getText'
]);