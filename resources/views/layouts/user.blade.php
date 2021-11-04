<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
      name="viewport"
    />
    <title>@yield('title')</title>

    @stack('prepend-style')
    <!-- General CSS Files -->
      <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
      />
      <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous"
      />

      <!-- CSS Libraries -->

      <!-- Template CSS -->
      <link rel="stylesheet" href="/style/stisla/scss/style.css" />
      <link rel="stylesheet" href="/style/stisla/scss/components.css" />

      <!-- aos -->
      <link href="/vendor/aos@2.3.1/aos.css" rel="stylesheet" />

      {{-- <style>
        .card-badge-notif{
          position: relative;
          top: -25px;
          right: -12px;
          bottom: 0px;
          background: #3e6bb3;
          color: white;
          border-radius: 25px;
          font-size: 0.6rem;
          width: 15px;
          height: 15px;
          padding: 3px
        }
      </style> --}}
    @stack('addon-style')
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar" data-aos="fade-down">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"
                  ><i class="fas fa-bars"></i
                ></a>
              </li>
            </ul>

          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle">
              <a
                href="{{ route('cart') }}"
                class="nav-link  nav-link-lg"
              >
                @php
                  $cart = \App\Cart::where('users_id', Auth::user()->id)->count();
                @endphp
                @if ($cart > 0)
                  <img src="/images/cart-icon-light.svg" alt="" />
                  <div class="card-badge">{{ $cart }}</div>
                @else
                  <img src="/images/cart-icon-light.svg" alt="" />
                @endif
                
              </a>
              
            </li>
            <li>
              <button
                type="button"
                class="btn btn-secondary btn-sm mt-1"
                style="background-color: #38465b; border-color: #38465b"
                data-toggle="modal"
                data-target="#openStore"
              >
                Buka toko
              </button>
              
            </li>
            <li class="dropdown">
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"
              >
                <img
                  alt="image"
                  @if (isset(Auth::user()->profile_photo))
                  src="{{ Storage::url(Auth::user()->profile_photo) }}"
                  @else
                  src="/images/user_default.svg"
                  @endif
                  class="rounded-circle mr-1"
                  style="max-height: 30px;"
                />
                <div class="d-sm-none d-lg-inline-block">
                  Hi, {{ Auth::user()->name }}
                </div></a
              >
              <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('dashboard-user') }}" class="dropdown-item has-icon">
                  <i class="fas fa-fire"></i> Dashboard
                </a>

                
                <div class="dropdown-divider"></div>
                <a 
                  class="dropdown-item has-icon text-danger" 
                  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  Logout
                </a>
                
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar" data-aos="fade-right">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="{{ route('home') }}">
                <img src="/images/logo.svg" alt="" class="mt-3" />
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="{{ route('home') }}">KE</a>
            </div>
            <ul class="sidebar-menu mt-4">
              <li class="nav-item {{ (request()->is('user')) ? 'active' : '' }}">
                <a href="{{ route('dashboard-user') }}" class="nav-link">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>

              <li class="nav-item {{ (request()->is('user/transaction*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('transaction-user.index') }}"
                  ><i class="fas fa-money-bill-wave"></i>
                  <span>Riwayat Transaksi</span></a
                >
              </li>
              <li class="nav-item {{ (request()->is('user/payment')) ? 'active' : '' }}">
                <a href="{{ route('payment.index') }}" class="nav-link">
                  <i class="fas fa-store"></i>
                  <span style="line-height: normal; letter-spacing: normal">
                    Proses Pembayaran
                  </span>
                  <div class="badge badge-primary">1</div>
                </a>
              </li>

              <li class="nav-item {{ (request()->is('user/account*')) ? 'active' : '' }}">
                <a href="{{ route('user-account') }}" class="nav-link">
                  <i class="fas fa-user"></i>
                  <span>Akun Saya</span>
                </a>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a
                href="{{ route('logout') }}"
                class="btn btn-outline-danger btn-lg btn-block btn-icon-split"
                onclick="
                  event.preventDefault();
                  document.getElementById('logout-form').submit();"
              >
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </aside>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>        

        {{-- <!-- Main Content --> --}}
        @yield('content')

        @include('includes.modals.openStore')

        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2021
            <div class="bullet"></div>
            Kekraf <a href="mailto: kekraf.store01@gmail.com">email : kekraf.store01@gmail.com</a>
          </div>
          <div class="footer-right"></div>
        </footer>

      </div>
    </div>

    @stack('prepend-script')
      <!-- General JS Scripts -->
      {{-- <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
      ></script> --}}
      <script
        type="text/javascript"
        src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
      ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

      <script src="/style/stisla/js/stisla.js"></script>

      <!-- JS Libraies -->

      <!-- Template JS File -->

      <script src="/style/stisla/js/scripts.js"></script>

      <script src="/style/stisla/js/custom.js"></script>

      <!-- Page Specific JS File -->
      <script src="/vendor/aos@2.3.1/aos.js"></script>
      <script>
        AOS.init();
      </script>
    @stack('addon-script')
  </body>
</html>
