@extends('layouts.user')

@section('title')
    Kekraf - Transaction user
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Riwayat Transaksi</h1>
        <p>Transaksi yang sudah dilakukan</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col">
              <p class="text-center">Filter cari dan sorting tanggal dalam pengembangan</p>
              {{-- <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <form action="">
                        <div class="input-group d-flex">
                          <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari daftar transaksi"
                          />
                          <div class="input-group-prepend">
                            <button
                              class="
                                btn btn-outline-primary
                                rounded-right
                              "
                            >
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-6">
                      <form action="">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-calendar"></i>
                            </div>
                          </div>
                          <input
                            type="text"
                            name="daterange"
                            class="form-control daterange-cus"
                            placeholder="Masukkan rentang tanggal"
                          />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <h2 class="section-title">Riwayat Semua Transaksi</h2>
              <p class="text-center">Masih dalam tahap pengembangan</p>
              {{-- <div class="card">
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
                        src="/images/KacaMataAntiRadiasi.jpg"
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
                        src="/images/pencil-4.jpg"
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
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('addon-style')
  <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"
    />
@endpush

@push('addon-script')

{{-- <script
  type="text/javascript"
  src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"
></script> --}}
<script
  type="text/javascript"
  src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"
></script>
<script
  type="text/javascript"
  src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"
></script>

<script>
  $(function () {
    $('input[name="daterange"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
        applyLabel: "Terapkan",
        cancelLabel: "Bersihkan",
      },
      applyClass: "btn-primary",
    });

    $('input[name="daterange"]').on(
      "apply.daterangepicker",
      function (ev, picker) {
        $(this).val(
          picker.startDate.format("MM/DD/YYYY") +
            " - " +
            picker.endDate.format("MM/DD/YYYY")
        );
      }
    );

    $('input[name="daterange"]').on(
      "cancel.daterangepicker",
      function (ev, picker) {
        $(this).val("");
      }
    );
  });
</script>
    
@endpush