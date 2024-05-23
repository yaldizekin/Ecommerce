<?php

namespace App\Providers;
use App\Models\Models\Product;
use App\Models\User;
use App\Models\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['yonetim.*'], function($view){
            $bitiszamani=now()->addMinutes(10);
            $istatistikler = Cache::remember('istatistikler',$bitiszamani, function(){
                return[ 
                    'toplam_urun'=>Product::count(),
                    'toplam_kullanici'=>User::count(),
                    'toplam_kategori'=>Category::count()
                ];
            });
            $view->with('istatistikler',$istatistikler);
        });
    }
}
