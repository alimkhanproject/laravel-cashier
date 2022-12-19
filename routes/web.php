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

Auth::routes();

Route::get('/', 'ProductController@index');

Route::get('product_details/{id}', 'ProductController@product_details');

Route::post('products/{id}/purchase', 'CheckoutController@purchase')->name('products.purchase');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');