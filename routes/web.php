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

Route::resource('coupon','CouponController');
Route::resource('/shop','shopController@index');

Route::get('addcart/{shop}','cartController@cartAdd')->name('product.cartAdd');


Route::get('/cart','CartController@cart')->name('product.cart');

Route::get('/product','ProductController@index')->name('product.index');

Route::post('/product','ProductController@apply')->name('product.create');
