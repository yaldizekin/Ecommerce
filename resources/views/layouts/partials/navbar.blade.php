<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a class="navbar-brand" href="/">
                    <img src="/img/logo.png">
                </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/kategori" class="nav-link px-2 link-secondary">Kategoriler</a></li>
          <li><a href="/urun" class="nav-link px-2 link-dark">Ürünler</a></li>
          <li><a href="/sepet" class="nav-link px-2 link-dark">Sepetim</a></li>
          @guest
          <li><a href="{{route('user.login')}}" class="nav-link px-2 link-dark">Oturum Aç</a></li>
          <li><a href="{{route('user.register')}}" class="nav-link px-2 link-dark">Kaydol</a></li>
          @endguest
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{route('search')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        
          <input type="search" class="form-control" placeholder="Search..." name="searched" aria-label="Search" value="{{old('searched')}}">
        </form>
        @auth
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
         
     
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Çıkış Yap</a>
          <form id="logout-form" action="{{route('user.logout')}}" method="post" style="display: none;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
          </li>
          </ul>
          @endauth
        </div>
      </div>
    </div>
  </header>