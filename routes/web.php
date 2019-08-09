<?php
use Illuminate\Support\Facades\Route;
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
})->name('intro');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/register/chooseDistrict', 'AjaxController@chooseDistrict')->name('register.selectDistrict');
Route::get('/user/confirm', 'UserController@confirm_order')->name('order.confirm');


Route::get('dsDonHang','CustomerController@dsDonHang');
Route::get('donHang/{id}','CustomerController@donHang');
Route::post('huyDonHang/{id}','CustomerController@huyDonHang');

//General
Route::get('ttTaiKhoan','UserController@ttTaiKhoan');
Route::get('thayDoittTaiKhoan','UserController@thayDoittTaiKhoan');
Route::get('thayDoiMatKhau/{alert}','UserController@thayDoiMatKhau');
Route::get('DBCommunes/{id}','UserController@DBCommunes');
Route::any('saveInformation','UserController@saveInformation');
Route::any('savePassword','UserController@savePassword');

//Admin
Route::get('dsTaiKhoan','AddminController@dsTaiKhoan');
Route::any('changeState/{id}','AddminController@changeState');
Route::get('taiKhoan/{id}','AddminController@taiKhoan');
Route::get('xoaTaiKhoan/{id}','AddminController@xoaTaiKhoan');
Route::get('themTaiKhoan','AddminController@themTaiKhoan');
Route::any('saveAccount','AddminController@saveAccount');

//Shipper
Route::any('waitingOrders','ShipperController@waitingOrders');
Route::any('S_detailOrder/{id}','ShipperController@detailOrder');
Route::any('takeOrder/{id}','ShipperController@takeOrder');

Route::group(['prefix' => 'home'], function () {
});
