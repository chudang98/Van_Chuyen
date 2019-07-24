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
Route::get('dsDonHang/{id}','ClientController@dsDonHang');
Route::get('donHang/{id}','ClientController@donHang');
Route::get('huyDonHang/{id}','ClientController@huyDonHang');
//Route::get('about/{theSubject}','AboutController@showSubject');
