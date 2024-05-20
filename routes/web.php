<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::post('/ara', 'App\Http\Controllers\ProductController@search')->name('search');
Route::get('/ara', 'App\Http\Controllers\ProductController@search')->name('search');

Route::get('/kategori/{slug_categoryName}', 'App\Http\Controllers\CategoryController@category')->name('category');
Route::get('/urun/{slug_productName}', 'App\Http\Controllers\ProductController@product')->name('product');
Route::get('/sepet', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/odeme', 'App\Http\Controllers\PaymentController@payment')->name('payment');
Route::get('/siparisler', 'App\Http\Controllers\OrderController@order')->name('order');
Route::get('/siparisler/{id}', 'App\Http\Controllers\OrderController@detail')->name('card');

Route::group(['prefix'=>'kullanici'], function(){
Route::get('/kayit', 'App\Http\Controllers\UserController@register_form')->name('user.register');
Route::post('/kayit', 'App\Http\Controllers\UserController@register');
Route::get('/giris', 'App\Http\Controllers\UserController@login_form')->name('user.login');
});
