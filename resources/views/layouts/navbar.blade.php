<nav class="navbar navbar-expand navbar-light bg-light shadow-sm mb-5">
  <div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}">Obuca</a>
    <ul class="navbar-nav ms-auto">
      @if (Route::has('login'))
        @auth
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <a href="{{ route('cart') }}" type="button" class="btn btn-primary">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Korpa <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span></a>
                </div>
            </div>
          </div>
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="nav-link text-dark">Home</a>
        </li>  
        @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link text-dark">Login</a>
          </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link text-dark">Register</a>
          </li>
        @endif
        @endauth
        @endif
    </ul>
  </div>
</nav>