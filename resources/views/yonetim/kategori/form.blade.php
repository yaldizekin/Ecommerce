@extends('yonetim.layouts.master')
@section('title', 'Form')


@section('content')

<h1 class="sub-header">Kategori Yönetim</h1>
         <form method="post" action="{{route('yonetim.kategori.kaydet', @$entry->id)}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">
                {{@$entry->id > 0 ? "Güncelle" : "Ekle"}}
                </button>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="upper_id">Üst Kategori</label>
                                <select type="upper_id"  name="upper_id"  id="upper_id">
                                <option value=""> Ana Kategori    </option> 
                                    @foreach($kategoriler as $kategori)
                                   <option value="{{$kategori->id}}">
                                    {{$kategori->category_name}}
                                   </option> 
                                   @endforeach
                               
                                </select>
                        </div>
                    </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="category_name">Kategori Adı</label>
                                <input type="category_name" class="form-control" name="category_name" value="{{$entry->category_name}}" id="category_name" placeholder="Kategori Adı">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="hidden" name="orjinal_slug" value="{{old('slug', $entry->slug)}}">
                                <input type="text" class="form-control" name="slug" value="{{$entry->slug}}" id="slug" placeholder="slug">
                        </div>
                    </div>
                     
                       
                        </div>
                    </div>  
                </div>  
                  
        </form>


@endsection