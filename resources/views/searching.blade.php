@extends('layouts.master')



@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route ('index')}}">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Arama Sonucu</li>
  </ol>
</nav>

<div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        @if(count($products)==0)
                        <div class="col-md-12 text-center">
                            Aramanızla eşleşen bir ürün bulunamadı.
                        </div>
                        @endif
                    @foreach($products as $product)
                        <div class="col-md-3 product">
                            <a href="{{route ('product',$product->slug)}}"><img src="https://picsum.photos/400/400"></a>
                            <p><a href="{{route ('product',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}}₺</p>
                        </div>
                        @endforeach
                    </div>
                    {{ $products->appends(['searched'=> old('searched')])->links() }}
                </div>
            </div>
        </div>
@endsection