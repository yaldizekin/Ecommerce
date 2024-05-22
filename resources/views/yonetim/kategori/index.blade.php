@extends('yonetim.layouts.master')
@section('title', 'Yönetim Anasayfa')


@section('content')
<h4>Kategori yönetim</h4>

<h1 class="sub-header">
                    <div class="btn-group pull-right" role="group" aria-label="Basic example">
                      
                        <a href="{{route('yonetim.kategori.yeni')}}" class="btn btn-primary">Yeni</a>
                    </div>
                 
                </h1>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Slug</th>
                                <th>Kategori Adı</th>
                                <th>Kayıt tarihi</th>


                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $entry)
                            <tr>
                                <td>{{$entry->id}}</td>
                                <td>{{$entry->slug}}</td>
                                <td>{{$entry->category_name}}</td>
                                <td>{{$entry->created_at}}
                                
                                <td style="width: 100px">
                                    <a href="{{route('yonetim.kategori.duzenle', $entry->id)}}" class="btn btn-xs btn-success" data-toggle="duzenle" data-placement="top" title="Duzenle">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    <a href="{{route('yonetim.kategori.sil', $entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                     
                    </table>
                    
                </div>
@endsection