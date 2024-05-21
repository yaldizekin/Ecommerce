<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::namespace('App\Http\Controllers\Yonetim')->group(function(){
    Route::prefix('yonetim')->group(function(){
        Route::get('/oturumac','KullaniciController@oturumac')->name('yonetim.oturumac');
    });
});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::post('/ara', 'App\Http\Controllers\ProductController@search')->name('search');
Route::get('/ara', 'App\Http\Controllers\ProductController@search')->name('search');

Route::get('/kategori/{slug_categoryName}', 'App\Http\Controllers\CategoryController@category')->name('category');
Route::get('/urun/{slug_productName}', 'App\Http\Controllers\ProductController@product')->name('product');

Route::group(['prefix'=>'sepet'], function(){
Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::post('/ekle', 'App\Http\Controllers\BasketController@add')->name('basket.add');
Route::delete('/kaldir/{rowid}', 'App\Http\Controllers\BasketController@remove')->name('remove.basket');
Route::delete('/bosalt', 'App\Http\Controllers\BasketController@empty')->name('basket.empty');
Route::patch('/guncelle/{rowid}', 'App\Http\Controllers\BasketController@guncelle')->name('basket.guncelle');

});
Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    // ...
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/odeme', 'App\Http\Controllers\PaymentController@payment')->name('payment');
    Route::get('/siparisler', 'App\Http\Controllers\OrderController@order')->name('order');
    Route::get('/siparisler/{id}', 'App\Http\Controllers\OrderController@detail')->name('card');
});

Route::group(['prefix'=>'kullanici'], function(){
Route::get('/kayit', 'App\Http\Controllers\UserController@register_form')->name('user.register');
Route::post('/kayit', 'App\Http\Controllers\UserController@register');
Route::get('/giris', 'App\Http\Controllers\UserController@login_form')->name('user.login');
Route::post('/giris', 'App\Http\Controllers\UserController@login');
Route::get('/aktiflestir/{anahtar}', 'App\Http\Controllers\UserController@activated')->name('activated');
Route::post('/oturumukapat', 'App\Http\Controllers\UserController@logout')->name('user.logout');
});

Route::get('/test/mail', function() {
    $user=\App\Models\User::find(1);
    return new App\Mail\UserRegisterMail($user);
});