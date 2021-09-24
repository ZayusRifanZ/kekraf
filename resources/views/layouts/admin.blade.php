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
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

      {{-- datatable --}}
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.2/datatables.min.css"/>

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
            <li class="dropdown">
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"
              >
                <img
                  alt="image"
                  src="/images/Profil.png"
                  class="rounded-circle mr-1"
                />
                <div class="d-sm-none d-lg-inline-block">
                  Hi, Ujang Maman
                </div></a
              >
              <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('home') }}" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar" data-aos="fade-right">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.html">
                <img src="/images/logo_for_admin_dashboard.svg" alt="" class="mt-3" />
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.html">KE</a>
            </div>
            <ul class="sidebar-menu mt-4">
              <li class="nav-item ">
                <a href="{{ route('dashboard-admin') }}" class="nav-link">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>

              <li class="nav-item {{ (request()->is('admin/product')) ? 'active' : '' }}" >
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="fas fa-chart-area"></i>
                  <span>Produk </span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}" >
                <a href="{{ route('product-gallery.index') }}" class="nav-link">
                  <i class="fas fa-image"></i>
                  <span>Galeri Produk </span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/category*')) ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link ">
                  <i class="fas fa-th-large"></i>
                  <span>Kategori</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-money-bill-wave"></i>
                  <span>Transaksi</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="fas fa-user"></i>
                  <span>Pengguna</span>
                </a>
              </li>

              
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a
                href="{{ route('home') }}"
                class="btn btn-outline-danger btn-lg btn-block btn-icon-split"
              >
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </aside>
        </div>

        {{-- <!-- Main Content --> --}}
        @yield('content')

        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2021
            <div class="bullet"></div>
            Kekraf <a href="#">email : kekraf@example.com</a>
          </div>
          <div class="footer-right">2.3.0</div>
        </footer>
      </div>
    </div>

    @stack('prepend-script')
      <!-- General JS Scripts -->
      
      <script src="/vendor/jquery/jquery-3.6.0.min.js"></script>
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

      {{-- datatable script --}}
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.2/datatables.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

      <script src="/style/stisla/js/stisla.js"></script>

      <!-- JS Libraies -->

      <!-- Template JS File -->

      <script src="/style/stisla/js/scripts.js"></script>

      <script src="/style/stisla/js/custom.js"></script>

      <!-- Page Specific JS File -->
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
    @stack('addon-script')
  </body>
</html>
