@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Dashboard</h1>
        <p>Lihat apa yang telah Anda buat hari ini!</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Pelanggan</div>
                  <div class="dashboard-card-subtitle">15,209</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Pendapatan</div>
                  <div class="dashboard-card-subtitle">Rp 902,000</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Transaksi</div>
                  <div class="dashboard-card-subtitle">20,020,000</div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h2 class="section-title">Riwayat Transaksi</h2>
              <a
                href="{{ url('/dashboard/transaction/1') }}"
                class="card card-list d-blok mb-2"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/KacaMataAntiRadiasi.jpg"
                        alt=""
                        class="w-100"
                      />
                    </div>
                    <div class="col-md-4">Kaca mata anti radiasi</div>
                    <div class="col-md-3">Gumala Kumar</div>
                    <div class="col-md-3">12 Januari, 2020</div>
                    <div class="col-md-1 d-none d-md-block">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </a>
              <a
                href="{{ url('/dashboard/transaction/1') }}"
                class="card card-list d-blok mb-2"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/AdidasSepatuBasket.jpg"
                        alt=""
                        class="w-100"
                      />
                    </div>
                    <div class="col-md-4">Adidas Sepatu Basket</div>
                    <div class="col-md-3">Grid</div>
                    <div class="col-md-3">12 Januari, 2020</div>
                    <div class="col-md-1 d-none d-md-block">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </a>
              <a
                href="{{ url('/dashboard/transaction/1') }}"
                class="card card-list d-blok mb-2"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="/images/ParfumMyramK.jpg"
                        alt=""
                        class="w-100"
                      />
                    </div>
                    <div class="col-md-4">Parfum MyramK</div>
                    <div class="col-md-3">Weed nim</div>
                    <div class="col-md-3">12 Januari, 2020</div>
                    <div class="col-md-1 d-none d-md-block">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection