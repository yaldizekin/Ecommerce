<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class KullaniciController extends Controller
{
   public function oturumac() {
      if(request()->isMethod('POST')) {
          $this->validate(request(), [
              'email' => 'required|email',
              'password' => 'required'
          ]);
  
          if (auth()->attempt(['email' => request('email'), 'password' => request('password'), 'is_admin' => 1], request()->has('rememberMe'))) {
              return redirect()->route('yonetim.anasayfa');
          } else {
              $errors = ['email' => 'Hatalı Giriş'];
              return back()->withInput()->withErrors(['email' => 'Giriş Hatalı']);
          }
      }
  
      return view('yonetim.oturumac');
  }
  public function oturumukapat() {
        Auth::guard('yonetim')->logout();
       request()->session()->flush();
       request()->session()->regenerate();
        return redirect()->route('yonetim.oturumac');
    }   
}
