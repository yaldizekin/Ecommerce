<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::namespace('App\Http\Controllers\Yonetim')->group(function(){
    Route::prefix('yonetim')->group(function(){
        Route::match(['get','post'],'/oturumac','KullaniciController@oturumac')->name('yonetim.oturumac');
        Route::redirect('/','/yonetim/oturumac');
        Route::get('/oturumukapat','KullaniciController@oturumukapat')->name('yonetim.oturumukapat');

     Route::group(['middleware'=>'auth'], function(){
    Route::get('/anasayfa','AnasayfaController@index')->name('yonetim.anasayfa');

    Route::prefix('kullanici')->group(function(){
        Route::match(['get','post'],'/','KullaniciController@index')->name('yonetim.kullanici');
        Route::get('/yeni','KullaniciController@form')->name('yonetim.kullanici.yeni');
        Route::get('/duzenle/{id}','KullaniciController@form')->name('yonetim.kullanici.duzenle');
        Route::post('/kaydet/{id?}','KullaniciController@kaydet')->name('yonetim.kullanici.kaydet');
        Route::get('/sil({id}','KullaniciController@sil')->name('yonetim.kullanici.sil');

    });
    Route::prefix('kategori')->group(function(){
        Route::match(['get','post'],'/','KategoriController@index')->name('yonetim.kategori');
        Route::get('/yeni','KategoriController@form')->name('yonetim.kategori.yeni');
        Route::get('/duzenle/{id}','KategoriController@form')->name('yonetim.kategori.duzenle');
        Route::post('/kaydet/{id?}','KategoriController@kaydet')->name('yonetim.kategori.kaydet');
        Route::get('/sil({id}','KategoriController@sil')->name('yonetim.kategori.sil');

    });
    Route::prefix('urun')->group(function(){
        Route::match(['get','post'],'/','UrunController@index')->name('yonetim.urun');
        Route::get('/yeni','UrunController@form')->name('yonetim.urun.yeni');
        Route::get('/duzenle/{id}','UrunController@form')->name('yonetim.urun.duzenle');
        Route::post('/kaydet/{id?}','UrunController@kaydet')->name('yonetim.urun.kaydet');
        Route::get('/sil({id}','UrunController@sil')->name('yonetim.urun.sil');

    });
    Route::prefix('siparis')->group(function(){
        Route::match(['get','post'],'/','SiparisController@index')->name('yonetim.siparis');
        Route::get('/yeni','SiparisController@form')->name('yonetim.siparis.yeni');
        Route::get('/duzenle/{id}','SiparisController@form')->name('yonetim.siparis.duzenle');
        Route::post('/kaydet/{id?}','SiparisController@kaydet')->name('yonetim.siparis.kaydet');
        Route::get('/sil({id}','SiparisController@sil')->name('yonetim.siparis.sil');

    });
        
    });
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

Route::get('/odeme', 'App\Http\Controllers\PaymentController@index')->name('payment');
Route::post('/odeme', 'App\Http\Controllers\PaymentController@odemeyap')->name('odemeyap');


Route::group(['middleware'=>'auth'], function(){
    Route::match(['get','post'],'/siparisler', 'App\Http\Controllers\OrderController@siparisler')->name('siparisler');
    Route::match(['get','post'],'/siparisler/{id}', 'App\Http\Controllers\OrderController@detail')->name('card');
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