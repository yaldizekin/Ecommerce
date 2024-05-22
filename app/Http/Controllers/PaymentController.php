<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Models\Order;

class PaymentController extends Controller
{
    public function Index(){

        if(!auth()->check()){
            return redirect()->route('user_login')
            ->with('message_type','info')
            ->with('message', 'Ödeme yapmak için oturum aç');
        }else if(count(Cart::content())==0){
            return redirect()->route('/')
            ->with('message_type','info')
            ->with('message','Sepetinizde ürün bulunmamaktadır.');
        }

        $user_detail=auth()->user()->detail;
  
        return view ('Payment', compact('user_detail'));

    }
    public function odemeyap(){
        $torder=request()->all();
        $torder['basket_id']=session('active_basket_id');
        $torder['price']=Cart::subtotal();
        $torder['situation']='Siparişiniz alındı.';
        $torder['bank']='Garanti';
        $torder['taksit']=1;
       
        

        Order::create($torder);
        Cart::destroy();
        session()->forget('active_order_id');

        return redirect()->route('siparisler');

    }
}
