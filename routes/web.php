<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::post('/user/confirm', 'OrderController@confirm_order')->name('order.confirm');
Route::post('back', 'UserController@back')->name('order.back');
Route::get('saveOrder', 'OrderController@saveOrder');
Route::get('editOrder', 'OrderController@editOrder');
Route::get('cancelOrder', 'OrderController@cancelOrder');



// AJAX controller
Route::get('/register/chooseDistrict', 'AjaxController@chooseDistrict')->name('register.selectDistrict');
Route::get('/deleteSession', 'AjaxController@deleteSession')->name('ajax.deleteSession');

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
Route::get('orders','AddminController@orders');

//Shipper
Route::get('waitingOrders','ShipperController@waitingOrders');
Route::get('S_detailOrder/{id}','ShipperController@detailOrder');
Route::get('takeOrder/{id}','ShipperController@takeOrder');
Route::get('completeOrder/{id}','ShipperController@completeOrder');
Route::any('failOrder/{id}','ShipperController@failOrder');
Route::get('deliveryOrders','ShipperController@deliveryOrders');

Route::group(['prefix' => 'home'], function () {
});
