<?php

namespace App\Http\Controllers;
use App\Models\Models\Product;

use App\Models\Models\Category;
use App\Models\Models\ProductDetail;

class HomeController extends Controller {

    public function Index(){

        $categories = Category::whereRaw('upper_id is null')->take(8)->get();

        

        $products_slider = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.show_slider',1)
        ->orderBy('created_at','desc')
        ->take(5)->get();

        $product_deal_of_day = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.deal_of_day',1)
        ->orderBy('created_at','desc')
        ->first();

        $product_featured = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.featured',1)
        ->orderBy('created_at','desc')
        ->take(4)->get();

        $product_bestseller = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.bestseller',1)
        ->orderBy('created_at','desc')
        ->take(4)->get();

        $product_discounted = Product::select('product.*')
        ->join('product_detail', 'product_detail.product_id','product.id')
        ->where('product_detail.discounted',1)
        ->orderBy('created_at','desc')
        ->take(4)->get();

    
        return view ('Index',compact('categories', 'products_slider','product_deal_of_day',
        'product_featured', 'product_bestseller','product_discounted'));

    }

}