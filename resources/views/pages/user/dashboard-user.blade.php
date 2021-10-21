@extends('layouts.user')

@section('title')
    Kekraf - Dashboard User
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
            
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 col-sm-3 col-3">
                      <img
                        src="images/Profil.png"
                        alt="photo-profile"
                        class="rounded-circle w-100"
                      />
                      
                    </div>
                    <div class="col-md 10 col-sm-9 col-9">
                      <div class="dashboard-card-title">
                        Hi Zayus, sekarang kamu sebagai
                      </div>
                      <div class="dashboard-card-subtitle-user">
                        Member Kekraf
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="mr-2 dashboard-card-title">Transaksi</div>
                    <div class="dashboard-card-title-select">
                      Selama 2021
                    </div>
                  </div>
                  <div class="dashboard-card-subtitle-user">
                    Rp 300,000
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mt-2">
              <h2 class="section-title">Riwayat Transaksi</h2>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="info-card-transaction mr-2">
                      17 april 2021
                    </div>
                    <div
                      class="
                        info-card-badge-custom-primary
                        rounded-lg
                        mr-2
                      "
                    >
                      Selesai
                    </div>
                    <!-- <div class="info-card-transaction mr-2">
                      INV/20210417/MPL/1178272086
                    </div> -->
                  </div>

                  <div class="row mt-2">
                    <div class="col-sm-1 col-3">
                      <img
                        src="images/KacaMataAntiRadiasi.jpg"
                        alt=""
                        class="w-100 rounded-lg"
                      />
                    </div>
                    <div class="col-sm-8 col-9">
                      <div class="text-small-secondary">Store_Numa</div>
                      <div class="product-name-transaction">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Veritatis harum maiores aliquam eum nostrum
                        ex at libero doloribus, perspiciatis fuga illo
                        eaque officiis quis culpa asperiores autem
                        quaerat! Deserunt, accusamus?
                      </div>

                      <div class="info-card-transaction">Rp 36,000</div>
                      <div class="info-card-transaction">
                        +1 produk lainya
                      </div>
                    </div>
                    <div class="col-sm-3 border-left">
                      <div class="text-medium-secondary">
                        Total Belanja
                      </div>
                      <div class="mb-2 text-large-secondary">
                        Rp 72,000
                      </div>
                      <a
                        href="#"
                        class="btn btn-outline-primary btn-block"
                        >Lihat detail Transaksi
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="info-card-transaction mr-2">
                      15 Mei 2021
                    </div>
                    <div
                      class="
                        info-card-badge-custom-danger
                        rounded-lg
                        mr-2
                      "
                    >
                      Gagal
                    </div>
                    <!-- <div class="info-card-transaction mr-2">
                      INV/20210417/MPL/1178272086
                    </div> -->
                  </div>

                  <div class="row mt-2">
                    <div class="col-sm-1 col-3">
                      <img
                        src="images/pencil-4.jpg"
                        alt=""
                        class="w-100 rounded-lg"
                      />
                    </div>
                    <div class="col-sm-8 col-9">
                      <div class="text-small-secondary">2b_pencil</div>
                      <div class="product-name-transaction">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Veritatis harum maiores aliquam eum nostrum
                        ex at libero doloribus, perspiciatis fuga illo
                        eaque officiis quis culpa asperiores autem
                        quaerat! Deserunt, accusamus?
                      </div>

                      <div class="info-card-transaction">Rp 3,000</div>
                      <div class="info-card-transaction">
                        +1 produk lainya
                      </div>
                    </div>
                    <div class="col-sm-3 border-left">
                      <div class="text-medium-secondary">
                        Total Belanja
                      </div>
                      <div class="mb-2 text-large-secondary">
                        Rp 6,000
                      </div>
                      <a
                        href="#"
                        class="btn btn-outline-primary btn-block"
                        >Lihat detail Transaksi
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

