<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Product;

class ProductController extends Controller
{
    public function Product($slug_productName){

        $product =Product::where('slug', $slug_productName)->firstOrFail();

        $categories = $product->categories()->distinct()->get();


        return view ('Product', compact('product', 'categories'));

    }

    public function Search() {

        $searched=request()->input('searched');
        $products = Product::where('product_name', 'like', "%$searched%")
        ->orWhere('description', 'like', "%$searched%")
        ->simplePaginate(8);
        request()->flash();
        return view('Searching', compact('products'));
    }
}
