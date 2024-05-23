<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Models\Product;
use App\Models\Models\Basket;
use App\Models\Models\BasketProduct;

class BasketController extends Controller
{

    
    public function Basket(){

        return view ('Basket');

    }

    public function Add(){

        $product=Product::find(request('id'));
        $cartItem= Cart::add($product->id, $product->product_name, 1, $product->price,['slug'=>$product->slug]);

        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            if (!isset($active_basket_id)) {
                $active_basket = Basket::create([
                    'user_id' => auth()->id()
                ]);
                $active_basket_id = $active_basket->id;
                session()->put('active_basket_id', $active_basket_id);
            }

            BasketProduct::updateOrCreate(
                ['basket_id'=>$active_basket_id, 'product_id'=> $product->id],
                ['piece'=> $cartItem->qty, 'price'=>$product->price, 'situation'=>'Beklemede']
            );
        }
        return redirect()->route('basket');
        /*->with('message','Ürün sepete eklendi.')*/
        

    }

    public function Remove($rowid){

        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
            $cartItem=Cart::get($rowid);
            BasketProduct::where('basket_id',$active_basket_id)->where('product_id', $cartItem->id)->delete();
        }

        Cart::remove($rowid);
        return redirect()->route('basket');

    }

    public function Empty(){

        if (auth()->check()) {
            $active_basket_id = session('active_basket_id');
           
            BasketProduct::where('basket_id',$active_basket_id)->delete();
        }

        Cart::destroy();
        return redirect()->route('basket');

    }
    public function Guncelle($rowid, Request $request){

        $token = $request->header('X-CSRF-Token');

        

        Cart::update($rowid,request('adet'));
        session()->flash('message_type','success');
        session()->flash('message','Adet bilgisi güncellendi.');
       return response()->json(['success' => true]);

    }
}
