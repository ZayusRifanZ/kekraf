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
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}"> Beranda </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}"> Kategori </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> Reward </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>