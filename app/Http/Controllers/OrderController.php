<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Siparisler(){

        return view ('siparisler');

    }
    public function Detail(){

        return view ('Card');

    }
}
