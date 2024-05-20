@extends('layouts.master')
@section('title', 'Kayıt Ol')


@section('content')


        <div class="row">
            <div class="row mb-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kaydol</div>
                    <div class="panel-body">
@include('layouts.partials.error')
                        <form  role="form" method="POST" action="{{route('user.register')}} ">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                            <div class="form-group">
                                <label for="fullname" class="col-md-4 control-label">Ad Soyad </label>
                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="" required autofocus>
                                   
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Şifre (Tekrar)</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Kaydol
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


  

 

    @endsection