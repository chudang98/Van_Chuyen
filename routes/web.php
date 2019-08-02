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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dsDonHang','ClientController@dsDonHang');
Route::get('donHang/{id}','ClientController@donHang');
Route::get('huyDonHang/{id}','ClientController@huyDonHang');
//Route::get('about/{theSubject}','AboutController@showSubject');


Route::group(['prefix' => 'home'], function () {
    // Route::get('admin', function ()
    // {
    //     echo 'admin';
    // });
    // Route::get('customer', function ()
    // {
    //     echo 'customer';        
    // });
    // Route::get('shipper', function ()
    // {
    //     echo 'shipper';
    // });
});