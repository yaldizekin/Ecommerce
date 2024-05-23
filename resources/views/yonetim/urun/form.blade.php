@extends('yonetim.layouts.master')
@section('title', 'Form')


@section('content')

<h1 class="sub-header">Ürün Yönetim</h1>
        <form method="post" action="{{route('yonetim.urun.kaydet', @$entry->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
                
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">
                {{@$entry->id > 0 ? "Güncelle" : "Ekle"}}
                </button>
                
            </div>
                
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Ürün Adı</label>
                                <input type="product_name" class="form-control" name="product_name" value="{{$entry->product_name}}" id="product_name" placeholder="Ürün Adı">
                            </div>  
                    </div>
                </div>
                       
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="hidden" name="orjinal_slug" value="{{old('slug', $entry->slug)}}">
                                <input type="text" class="form-control" name="slug" value="{{$entry->slug}}" id="slug" placeholder="slug">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Fiyat</label>
                                <input type="text" class="form-control" name="price" value="{{$entry->price}}" id="price" placeholder="price">
                            </div>
                        
                    </div>           
                </div>           
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <input type="textarea" class="form-control" name="description" value="{{$entry->description}}" id="description" placeholder="description">
                            </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                        <div class="checkbox">
                        <label>
                            <input type="hidden" name="show_slider" value="0">
                            <input type="checkbox"  name="show_slider" value="1"{{  $entry->detail->show_slider ? 'checked' : '' }} > Sliderda Göster
                        </label>
                        <label>
                            <input type="hidden" name="deal_of_day" value="0">
                            <input type="checkbox"  name="deal_of_day" value="1"{{ $entry->detail->deal_of_day ? 'checked' : '' }}>  Günün Fırsatında Göster
                        </label>
                        <label>
                            <input type="hidden" name="featured" value="0">
                            <input type="checkbox"  name="featured" value="1"{{  $entry->detail->featured ? 'checked' : '' }}> Öne Çıkanlarda Göster
                        </label>
                        <label>
                            <input type="hidden" name="bestseller" value="0">
                            <input type="checkbox"  name="bestseller" value="1"{{  $entry->detail->bestseller ? 'checked' : '' }}> Çok Satanlarda Göster
                        </label>
                        <label>
                            <input type="hidden" name="discounted" value="0">
                            <input type="checkbox"  name="discounted" value="1"{{  $entry->detail->discounted ? 'checked' : '' }}> İndirimlilerde Göster
                        </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="categories">Kategoriler</label>
                                <select class="form-control" name="categories" id="categories" >
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->category_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div> 
                <!-- <div class="form-group">
                    @if($entry->detail->product_img!=null){
                        <img src="/uploads/urunler/{{$entry->detail->product_img}}" style=" height: 100px; margin-right:20px;" class="thumbnail pull-left">
                    }@endif
                     <label for="product_img">Ürün Resmi</label>
                        <input type="file" id="product_img" name="product_img">
                </div> -->
        </form>


@endsection
@section('head')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function(){
        $('#categories').select2()
    });
</script>
@endsection