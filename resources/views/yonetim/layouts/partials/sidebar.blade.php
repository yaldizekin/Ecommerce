<div class="list-group">
                    <a href="{{route('yonetim.anasayfa')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span>Anasayfa </a>
                    <a href="{{route('yonetim.urun')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Ürünler
                        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['toplam_urun']}}</span>
                    </a>
                    <a href="{{route('yonetim.kategori')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Kategoriler
                        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['toplam_kategori']}}</span>
                    </a>
                    <a href="{{route('yonetim.kullanici')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
                        <span class="badge badge-dark badge-pill pull-right">{{$istatistikler['toplam_kullanici']}}</span>
                    </a>
 </div>