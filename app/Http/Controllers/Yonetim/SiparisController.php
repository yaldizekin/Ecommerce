<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Order;
use App\Models\Models\Category;
use App\Models\Models\ProductDetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class SiparisController extends Controller
{
    public function index() {
    $list = Order::orderByDesc('created_at')->paginate(8);
     return view('yonetim.siparis.index', compact('list'));
    }


    public function form($id=0) {

        $entry= new Order;
        $product_categories=[];
         if ($id > 0) {
         $entry = Order::find($id);
        //  $product_categories = $entry->categories()->pluck('category_id')->all();
        }

        $categories = Category::all();
        return view('yonetim.siparis.form',compact('entry','categories','product_categories'));
    }

    public function kaydet($id=0) {
        $data=request()->only('product_name','slug', 'description','price');

        if(!request()->filled('slug')){
            $data['slug'] = Str::slug(request('product_name'));
        
        request()->merge(['slug'=>$data['slug']]); }

            $this->validate(request(),
       [
           'product_name'=>'required',
           'slug'         =>(request('orjinal_slug')!=request('slug') ? 'unique:product,slug' : ''),
           'price'=>'required'
        ]);

        $categories= request('categories');

        
     
       if($id>0){
           $entry = Order::where('id',$id)->firstOrFail();
           $entry->update($data);

           $product_detail= ProductDetail::where('product_id', $id)->firstOrFail();
           $product_detail->show_slider=request('show_slider');
           $product_detail->deal_of_day=request('deal_of_day');
           $product_detail->featured=request('featured');
           $product_detail->bestseller=request('bestseller');
           $product_detail->discounted=request('discounted');
           $product_detail->save();
          
       } else
       {
           
           $entry = Order::create($data);

       }

       if(request()->hasFile('product_img')){
        $this->validate(request(),[
            'product_img' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $product_img = request()->file('product_img');
        $product_img =request()->product_img;

        $dosyaAdi = $entry->id . "-" . time() . "-" . $product_img->extension();

        if($product_img->isValid()){

            $product_img->move('/uploads/urunler', $dosyaAdi);
            ProductDetail::updateOrCreate(
                ['product_id' => $entry->id],
                ['product_img' =>$dosyaAdi]
            );
        }
       }

      return redirect()
       ->route('yonetim.urun.duzenle', $entry->id);
    }

    public function sil($id){

        Order::destroy($id);

        return redirect()
        ->route('yonetim.urun');

    }
}
