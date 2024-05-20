<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function Login_Form(){

        return view ('user.login');

    }   
     public function Register_Form(){

        return view ('user.register');

    }
    public function Register()
    {

        $this->validate(request(),[
            'fullname'=>'required',
            'email'=>'required|email|unique:user',
            'password'=>'required|confirmed|min:5'

        ]);
        $user = User::create([
            'fullname'=>request('fullname'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')), 
            'activation_code'=>Str::random(60),
            'is_active' =>0
             
        ]);

        auth()->login($user);

        return redirect()->route('index');
    }
}
