@extends('layouts.master')
@section('title', 'Anasayfa')


@section('content')

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">
                        @foreach($categories as $category)
                        <a href="{{ route ('category', $category->slug) }}" class="list-group-item">
                            <i class="fa fa-arrow-circle-o-right"></i> 
                            {{$category->category_name}}
                        </a>
                            @endforeach
                         </div>
                </div>
            </div>
            <div class="col-md-6">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                        @for($i=0; $i < count($products_slider);$i++)

                        <button data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{$i==0 ? 'active' :' ' }}"></button>

                     @endfor
                 </div>
                 <div class="carousel-inner">                    
                        @foreach($products_slider as $index=>$product)
                        <div class="carousel-item {{$index==0 ? 'active' : ''}}"data-bs-interval="10000">
                            <img src="https://picsum.photos/640/400" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                            <h5 style="color: white;">{{$product->product_name}}</h5>  
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                        </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex flex-column flex-shrink-0 " id="sidebar-product">
                    <div class="card-text">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href="{{route ('product',$product_deal_of_day->slug)}}">
                            <img src="https://picsum.photos/300/300" class="img-responsive">
                            {{$product->product_name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($product_featured as $product)
                        <div class="col-md-3 product">
                            <a href="{{route ('product',$product->slug)}}"><img src="https://picsum.photos/400/400"></a>
                            <p><a href="{{route ('product',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}}₺</p>
                        </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                    @foreach($product_bestseller as $product)
                        <div class="col-md-3 product">
                            <a href="{{route ('product',$product->slug)}}"><img src="https://picsum.photos/400/400"></a>
                            <p><a href="{{route ('product',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}}₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                    @foreach($product_discounted as $product)
                        <div class="col-md-3 product">
                            <a href="{{route ('product',$product->slug)}}"><img src="https://picsum.photos/400/400"></a>
                            <p><a href="{{route ('product',$product->slug)}}">{{$product->product_name}}</a></p>
                            <p class="price">{{$product->price}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
  
@endsection