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
              {{-- <li>
                <a
                  href="#"
                  data-toggle="search"
                  class="nav-link nav-link-lg d-sm-none"
                  ><i class="fas fa-search"></i
                ></a>
              </li> --}}
            </ul>

            <!-- search element -->
            <!-- <div class="search-element">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
                data-width="250"
              />
              <button class="btn" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <div class="search-backdrop"></div>
            </div> -->
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle">
              <a
                href="#"
                data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg"
              >
                <img src="/images/cart-icon-light.svg" alt="" />
                <div class="card-badge"><span>3</span></div>
              </a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                  Notifications
                  <div class="float-right">
                    <a href="#">Mark All As Read</a>
                  </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Template update is available now!
                      <div class="time text-primary">2 Min Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                      <div class="time">10 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to
                      <b>Done</b>
                      <div class="time">12 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                      <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Low disk space. Let's clean it!
                      <div class="time">17 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Welcome to Stisla template!
                      <div class="time">Yesterday</div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </li>
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
                <a href="dashboard.html" class="dropdown-item has-icon">
                  <i class="fas fa-fire"></i> Dashboard
                </a>

                <a href="dashboard-setting.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="index.html" class="dropdown-item has-icon text-danger">
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
                <img src="/images/logo.svg" alt="" class="mt-3" />
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.html">KE</a>
            </div>
            <ul class="sidebar-menu mt-4">
              <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="fas fa-fire"></i>
                  <span>Dashboard</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('dashboard-product') }}" class="nav-link">
                  <i class="fas fa-chart-area"></i>
                  <span>Produk Saya</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard-transaction') }}"
                  ><i class="fas fa-money-bill-wave"></i>
                  <span>Transaksi</span></a
                >
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard-setting-store') }}" class="nav-link">
                  <i class="fas fa-store"></i>
                  <span>Setting Toko</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('dashboard-setting-account') }}" class="nav-link">
                  <i class="fas fa-user"></i>
                  <span>Akun Saya</span>
                </a>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a
                href="index.html"
                class="btn btn-primary btn-lg btn-block btn-icon-split"
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
      <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
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
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
    @stack('addon-script')
  </body>
</html>
