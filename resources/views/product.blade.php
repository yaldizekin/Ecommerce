@extends('layouts.master')
@section('title', $product->product_name)


@section('content')
<div class="">
        <ol class="breadcrumb">
            <li><a href="/">Anasayfa</a></li>
            @foreach($categories as $category)
            <li><a href="{{route('category', $category->slug)}}">{{$category->category_name}}</a></li>
            @endforeach
       
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="https://picsum.photos/400/200">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://picsum.photos/60"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://picsum.photos/60"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="https://picsum.photos/60"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$product->product_name}}</h1>
                    <p class="price">{{$product->price}} ₺</p>
                    <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">{{$product->description}}</a></li>
                    <li role="presentation"><a href="#t2" data-toggle="tab">Yorumlar</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="t1">Henüz yorum yok</div>
               
                </div>
            </div>

        </div>
    </div>
@endsection