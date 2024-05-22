@extends('layouts.master')
@section('title', 'Ödeme')


@section('content')
<div class="">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <form method='post' action="{{route('odemeyap')}}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <h3>Ödeme Bilgileri</h3>
                    <div class="form-group">
                        <label for="cartNo">Kredi Kartı Numarası</label>
                        <input type="text" class="form-control kredikarti" id="cartNo" name="cartNo" style="font-size:20px;" required>
                    </div>
                    <div class="form-group">
                        <label for="cardexpiredatemonth">Son Kullanma Tarihi</label>
                        <div class="row">
                            <div class="col-md-6">
                                Ay
                                <select name="cardexpiredatemonth" id="cardexpiredatemonth" class="form-control" required>
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                Yıl
                                <select name="cardexpiredateyear" class="form-control" required>
                                    <option>2017</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2" required>
                            </div>
                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Ön bilgilendirme formunu okudum ve kabul ediyorum.</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul ediyorum.</label>
                            </div>
                        </div>
                    </form>
                    <button type="submit"  class="btn btn-success btn-lg">Ödeme Yap</button>
                </div>
                <div class="col-md-7">
                    <h4>Ödenecek Tutar</h4>
                    <span class="price">{{Cart::total()}} <small>TL</small></span>
                <h4>İletişim ve fatura bilgileri</h4>
                <div class="row">
                <div class="form-group">
                                <label for="fullname" class="col-md-4 control-label">Ad Soyad </label>
                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{auth()->user()->fullname}}" required autofocus>
                                   
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="adress" class="col-md-4 control-label">Adres</label>
                                <div class="col-md-6">
                                    <input id="adress" type="text" class="form-control" name="adress" value="{{$user_detail->adress}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Telefon Numarası</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control phone" name="phone" value="{{$user_detail->phone}}" required>
                                </div>
                            </div>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
       
    </div>
@endsection
@section('footer')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $('.kredikarti').mask('0000-0000-0000-0000', { placeholder: "____-____-____-____" });
        $('.kredikarti_cvv').mask('000', { placeholder: "___" });
        $('.telefon').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });
    </script>
    @endsection