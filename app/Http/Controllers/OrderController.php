<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Order(){

        return view ('Order');

    }
    public function Detail(){

        return view ('Card');

    }
}
