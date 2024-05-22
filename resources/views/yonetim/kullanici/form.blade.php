@extends('yonetim.layouts.master')
@section('title', 'Form')


@section('content')

<h1 class="sub-header">Kullanıcı Yönetim</h1>
            <form method="post" action="{{route('yonetim.kullanici.kaydet', @$entry->id)}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
                
                <div class="pull-right">
                <button type="submit" class="btn btn-primary">
                {{@$entry->id > 0 ? "Güncelle" : "Ekle"}}
                </button>
                
                </div>
                
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullname">AdSoyad</label>
                                <input type="fullname" class="form-control" name="fullname" value="{{$entry->fullname}}" id="fullname" placeholder="AdSoyad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" value="{{$entry->email}}" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" value="{{$entry->password}}" id="password" placeholder="Password">
                            </div>
                        </div>
                 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Telefon</label>
                                <input type="text" class="form-control" name="phone" value="{{$entry->detail->phone}}" id="phone" placeholder="phone">
                            </div>
                        
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adress">Address</label>
                                <input type="text" class="form-control" name="adress" value="{{$entry->detail->adress}}" id="adress" placeholder="Adress">
                            </div>
                        </div>
                        <div class="col-md-6">
                   
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" value="is_active" name="is_active" value="1"{{$entry->is_active ? 'checked' : '' }}> Aktif mi?
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" value="is_admin" name="is_admin" value="1"{{$entry->is_admin ? 'checked' : '' }}> Yönetici mi?
                        </label>
                        </div>
                    </div>  
                </div>  
                  
            </form>


@endsection