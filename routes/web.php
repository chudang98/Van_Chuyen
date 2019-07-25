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
Route::get('dsDonHang','ClientController@dsDonHang');
Route::get('donHang/{id}','ClientController@donHang');
Route::get('huyDonHang/{id}','ClientController@huyDonHang');
Route::get('ttTaiKhoan','UserController@ttTaiKhoan');
Route::get('thayDoittTaiKhoan','UserController@thayDoittTaiKhoan');
Route::get('thayDoiMatKhau','UserController@thayDoiMatKhau');
//Route::get('about/{theSubject}','AboutController@showSubject');
