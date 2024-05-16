<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login_Form(){

        return view ('user.login');

    }   
     public function Register_Form(){

        return view ('user.register');

    }
}
