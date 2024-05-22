<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class KullaniciController extends Controller
{
    public function index()
     {
    $list = User::orderByDesc('created_at')->paginate(8);
    return view('yonetim.kullanici.index', compact('list'));
     }

   
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

    public function form($id=0) {

        $entry= new User;
         if ($id > 0) {
         $entry = User::find($id);
        }
       
        
        return view('yonetim.kullanici.form',compact('entry'));
    }

    public function kaydet($id=0) {

        $this->validate(request(),
        [
            'fullname'=>'required',
            'email' =>'required|email'
        ]);
        $data=request()->only('fullname','email');
        if(request()->filled('password')){
            $data['password']= Hash::make(request('password'));
        }
        
        $data['is_active']= request()->has('is_active') ? 1 : 0;
        $data['is_admin']= request()->has('is_active') ? 1 : 0;

        if($id>0){
            $entry = User::where('id',$id)->firstOrFail();
            $entry->update($data);
           
        } else{
            
            $entry = User::create($data);
        }
        UserDetail::updateOrCreate(
            ['user_id' => $entry->id],
            ['adress'=>request('adress'), 
             'phone' => request('phone')]
        );

        return redirect()
        ->route('yonetim.kullanici.duzenle', $entry->id);
    }

    public function sil($id){

        User::destroy($id);

        return redirect()
        ->route('yonetim.kullanici');

    }
}
