<?php

namespace App\Http\Controllers;

use App\Models\Models\Category;

class HomeController extends Controller {

    public function Index(){

        $categories = Category::whereRaw('upper_id is null')->take(8)->get();
        return view ('Index',compact('categories'));

    }

}