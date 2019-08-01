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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function(){
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dsDonHang','CustomerController@dsDonHang');
Route::get('donHang/{id}','CustomerController@donHang');
Route::get('huyDonHang/{id}','CustomerController@huyDonHang');
Route::get('ttTaiKhoan','UserController@ttTaiKhoan');
Route::get('thayDoittTaiKhoan/{alert}','UserController@thayDoittTaiKhoan');
Route::get('thayDoiMatKhau/{alert}','UserController@thayDoiMatKhau');
Route::get('DBCommunes/{id}','UserController@DBCommunes');
Route::any('saveInformation','UserController@saveInformation');
Route::any('savePassword','UserController@savePassword');
Route::get('dsTaiKhoan','AddminController@dsTaiKhoan');
Route::any('changeState/{id}','AddminController@changeState');
Route::get('taiKhoan/{id}','AddminController@taiKhoan');
Route::get('xoaTaiKhoan/{id}','AddminController@xoaTaiKhoan');
Route::get('themTaiKhoan','AddminController@themTaiKhoan');
Route::any('saveAccount','AddminController@saveAccount');
//Route::get('about/{theSubject}','AboutController@showSubject');
