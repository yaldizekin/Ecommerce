<?php

namespace App\Http\Controllers;

use App\Mail\UserRegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;


class UserController extends Controller
{
  
    public function Login_Form(){

        return view ('user.login');}   
    public function Login(){


        $this->validate(request(),[ 
            'email'=>'required|email',
            'password'=>'required']);


        if (auth()->attempt(['email'=> request('email'), 'password'=>request('password')], request()->has('rememberMe')))
            {
                request()->session()->regenerate();
                return redirect()->intended('/');    
        }else{
                $errors=['email'=>'Hatalı Giriş'];
                return back()->withErrors($errors);}
        } 



    public function Logout()
    {
     auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
         return redirect()->route('index');}   

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

        Mail::to(request('email'))->send(new UserRegisterMail($user));

        auth()->login($user);

        return redirect()->route('index');
    }
    public function Activated($anahtar)
    {
        $user=User::where('activation_code', $anahtar)->first();
        if(!is_null($user))
        {
            $user->activation_code=null;
            $user->is_active=1;
            $user->save();
            return redirect()->to('/')->with('message','Kullanıcı kaydınız aktifleştirildi')
            ->with('message_type','success' );
        }
    }

}
