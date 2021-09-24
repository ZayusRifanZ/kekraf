<nav
      class="
        navbar navbar-expand-lg navbar-light navbar-kekraf
        fixed-top
        navbar-fixed-top
      "
      data-aos="fade-down"
    >
      <div class="container">
        <a href="index.html">
          <img src="images/logo.svg" alt="" />
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
            <li class="nav-item active">
              <a class="nav-link" href="index.html"> Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.html"> Kategori </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> Reward </a>
            </li>
          </ul>
          <!-- Dektop menu -->
          <ul class="navbar-nav ml-auto d-none d-lg-flex">
            <form action="">
              <input type="text" name="search" placeholder="Search.." />
            </form>
            <li class="nav-item">
              <a href="#" class="nav-link d-inline-block mt-2">
                <img src="/images/cart icon.svg" alt="" />
                <div class="card-badge">3</div>
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
                Hi, Zayus
              </a>
              <div class="dropdown-menu">
                <a href="/dashboard.html" class="dropdown-item">Dashboard</a>
                <a href="/dashboard-account.html" class="dropdown-item"
                  >Setting</a
                >
                <div class="dropdown-divider"></div>
                <a href="/" class="dropdown-item">Logout</a>
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
        </div>
      </div>
    </nav>