@extends('layouts.master')
@section('title', $category->category_name)


@section('content')
<div class="">
<div class="container my-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
      <li class="breadcrumb-item">
        <a class="link-body-emphasis" href="{{route('index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="{{ route ('category', $category->slug) }}"> {{$category->category_name}}</a>
      </li>
      @if(count($subcategories)>0)
      <li class="breadcrumb-item active" aria-current="page">
       {{$category->category_name}}
      </li>
      @endif
    </ol>
  </nav>
</div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                  
                    <div class="panel-body">
                      
                        <div class="list-group categories">
                        @foreach($subcategories as $subcategory)
                        <a href="{{ route ('category', $subcategory->slug) }}" class="list-group-item">
                            <i class="fa fa-arrow-circle-o-right"></i> 
                            {{$subcategory->category_name}}
                        </a>
                            @endforeach
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    <div class="row">
                        @foreach($products as $product)

                        <div class="col-md-3 ">
                            <a href="{{ route ('product', $product->slug) }}"><img src="https://picsum.photos/400/400">fghjkl</a>
                            <p><a href="{{ route ('product', $product->slug) }}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}}</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach
                    </div>
                    {{products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection