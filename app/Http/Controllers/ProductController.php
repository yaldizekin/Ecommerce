<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Product($slug_productName){

        return view ('Product');

    }
}
