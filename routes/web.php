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



Route::get('/', 'Controller@master');

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