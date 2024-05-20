<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Models\Category;

class CategoryController extends Controller {

    public function Category($slug_categoryName){

        $category = Category::where('slug', $slug_categoryName)->firstOrFail();
        $subcategories= Category::where ('upper_id', $category->id)->get();

        $products = $category->products()->paginate(5);;

        return view ('category', compact('category', 'subcategories', 'products'));

    }

}