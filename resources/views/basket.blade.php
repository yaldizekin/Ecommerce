@extends('layouts.master')
@section('title', 'Sepet')


@section('content')
<div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>

            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Adet Fiyatı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                    
                </tr>
                @foreach(Cart::content() as $productCartItem)
               
                <tr>
                    <td> <img src="https://picsum.photos/120/100"></td> <td>{{$productCartItem->name}}</td>
                    <td>{{$productCartItem->price}}₺</td>
                    <td>
                  
                        <a href="#" class="btn btn-xs btn-default product-decrease" data-id="{{$productCartItem->rowId}}" data-adet="{{$productCartItem->qty-1}}">-</a>
                        <span >{{$productCartItem->qty}}</span>
                        <a href="#" class="btn btn-xs btn-default product-increase"data-id="{{$productCartItem->rowId}}" data-adet="{{$productCartItem->qty+1}}">+</a>
                        @csrf </td>
                    <td class="text-right">{{$productCartItem->subtotal}}</td>
               <td>
               <form action="{{route('remove.basket',$productCartItem->rowId)}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                </form>
               </td>
                </tr>
            
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Alt Toplam</th>
                    <th class="text-right">{{Cart::subtotal()}}₺</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">KDV</th>
                    <th class="text-right">{{Cart::tax()}}₺</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Genel Toplam</th>
                    <th class="text-right">{{Cart::total()}}₺</th>
                </tr>
            </table>
            <div>
                <form action="{{route('basket.empty')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger btn-xs" value="Sepeti Boşalt">
                </form>
                <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>
            @else 
            <p>Sepetiniz boş.</p>
            @endif
           
        </div>
    </div>
        
</div>
@endsection
