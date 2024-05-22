<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use App\Models\Models\Category;
use Illuminate\Support\Str;
use App\Models\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KategoriController extends Controller
{
    public function index()
    {
   $list = Category::orderByDesc('created_at')->paginate(8);
   return view('yonetim.kategori.index', compact('list'));
    }

    public function form($id=0) {

       $entry= new Category;
        if ($id > 0) {
        $entry = Category::find($id);
       }
       $kategoriler = Category::all();
      
       
       return view('yonetim.kategori.form',compact('entry', 'kategoriler'));
    }

    public function kaydet($id=0) {

       

       $data=request()->only('category_name','slug', 'upper_id');

        if(!request()->filled('slug')){
            $data['slug'] = Str::slug(request('category_name'));
        
        request()->merge(['slug'=>$data['slug']]); }

            $this->validate(request(),
       [
           'category_name'=>'required',
           'slug'         =>(request('orjinal_slug')!=request('slug') ?'unique:category,slug' : '')
        ]);
     
       if($id>0){
           $entry = Category::where('id',$id)->firstOrFail();
           $entry->update($data);
          
       } else{
           
           $entry = Category::create($data);
       }
      return redirect()
       ->route('yonetim.kategori.duzenle', $entry->id);
    }

    public function sil($id){

        Category::destroy($id);

       return redirect()
       ->route('yonetim.kategori');

    }
}
