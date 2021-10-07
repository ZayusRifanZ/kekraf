<nav
  class="
  navbar navbar-expand-lg navbar-light navbar-kekraf
  fixed-top
  navbar-fixed-top
  "
  data-aos="fade-down"
>
  <div class="container">
    <a href="{{ route('home') }}">
      <img src="/images/logo.svg" alt="" />
    </a>

    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('home') }}"> Beranda </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories') }}"> Kategori </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Reward </a>
        </li>
      </ul>
      @guest
      <ul class="navbar-nav ml-auto">
        <form action="">
          <input type="text" name="search" placeholder="Search.." />
        </form>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary" href="{{ route('register') }}">
          Daftar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary" href="{{ route('login') }}">Masuk</a>
        </li>
      </ul>
      @endguest

      @auth
        <ul class="navbar-nav ml-auto d-none d-lg-flex">
          <form action="">
          <input type="text" name="search" placeholder="Search.."/>
        </form>
          <li class="nav-item">
            <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
              @php
                  $cart = \App\Cart::where('users_id', Auth::user()->id)->count();
              @endphp
              @if ($cart > 0)
                <img src="/images/cart icon.svg" alt="" />
                <div class="card-badge">{{ $cart }}</div>
              @else
                <img src="/images/cart icon.svg" alt="" />
              @endif
              
            </a>
          </li>
          <li class="nav-item dropdown">
            <a
              href="#"
              class="nav-link"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >
              <img
                src="/images/icon-user.png"
                alt=""
                class="rounded-circle mr-2 profile-picture"
              />
              Hi, {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
              <a href="{{ route('dashboard-setting-account') }}" class="dropdown-item"
                >Setting</a
              >
              <div class="dropdown-divider"></div>
              <a 
                class="dropdown-item" 
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>

        <!-- Mobile menu -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a href="#" class="nav-link"> Hi, Zayus </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link d-inline-block"> Cart </a>
          </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>