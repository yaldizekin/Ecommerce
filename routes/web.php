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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('Index');
Route::get('/kategori/{slug_categoryName}', 'App\Http\Controllers\CategoryController@category')->name('Category');
Route::get('/urun/{slug_productName}', 'App\Http\Controllers\ProductController@product')->name('Product');
Route::get('/sepet', 'App\Http\Controllers\BasketController@basket')->name('Basket');
Route::get('/odeme', 'App\Http\Controllers\PaymentController@payment')->name('Payment');
Route::get('/siparisler', 'App\Http\Controllers\OrderController@order')->name('Order');
Route::get('/siparisler/{id}', 'App\Http\Controllers\OrderController@detail')->name('Card');

Route::group(['prefix'=>'user'], function(){
Route::get('/kayit', 'App\Http\Controllers\UserController@register_form')->name('user.Register');
Route::get('/giris', 'App\Http\Controllers\UserController@login_form')->name('user.Login');
});
