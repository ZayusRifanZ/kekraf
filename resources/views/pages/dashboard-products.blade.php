@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Product
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Produk Saya</h1>
        <p>kelola dengan baik dan dapatkan uang</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ route('dashboard-product-create') }}"
                class="btn btn-primary btn-block"
              >
                <i class="fas fa-plus"></i>
                Tambah produk
              </a>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ url('/dashboard/products/1') }}"
                class="card card-dashboard-product d-block"
              >
                <div class="card-body">
                  <img
                    src="/images/pencil-3.jpg"
                    alt="img-card-1"
                    class="w-100 mb-2 img-card-custom"
                  />
                  <div class="product-title">Pensil Mewarnai</div>
                  <div class="product-category">alat tulis</div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ url("/dashboard/products/1") }}"
                class="card card-dashboard-product d-block"
              >
                <div class="card-body">
                  <img
                    src="/images/CocaCola.jpg"
                    alt="img-card-1"
                    class="w-100 mb-2 img-card-custom"
                  />
                  <div class="product-title">CocaCola</div>
                  <div class="product-category">minuman</div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ url("/dashboard/products/1") }}"
                class="card card-dashboard-product d-block"
              >
                <div class="card-body">
                  <img
                    src="/images/DayCream.jpg"
                    alt="img-card-1"
                    class="w-100 mb-2 img-card-custom"
                  />
                  <div class="product-title">Day Cream</div>
                  <div class="product-category">kosmetik</div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ url("/dashboard/products/1") }}"
                class="card card-dashboard-product d-block"
              >
                <div class="card-body">
                  <img
                    src="/images/AdidasSepatuBasket.jpg"
                    alt="img-card-1"
                    class="w-100 mb-2 img-card-custom"
                  />
                  <div class="product-title">Adidas Sepatu Basket</div>
                  <div class="product-category">sepatu</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection