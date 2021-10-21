@extends('layouts.user')

@section('title')
    Kekraf - Dashboard
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Proses pembayaran</h1>
        <p>Pembayaran barang yang belum di lakukan</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <!-- <h2 class="section-title">Menunggu Pembayaran</h2> -->
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-between mb-2">
                <div class="col-sm-4 info-card-transaction">
                  17 april 2012
                </div>
                <div class="col-sm-4 info-card-transaction">
                  Bayar sebelum

                  <span class="text-warning">
                    <i class="fas fa-clock"></i>
                    18 apl, 01:08
                  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-1 col-3">
                  <img
                    src="/images/bgHexEEE.png"
                    alt=""
                    class="rounded-lg w-100"
                  />
                </div>
                <div class="col-sm-3 col-9">
                  <div class="info-card-transaction">
                    Metode Pembayaran
                  </div>
                  <div class="product-name-transaction">Briva</div>
                </div>
                <div class="col-sm-4">
                  <div class="info-card-transaction">
                    Nomor virtual akun
                  </div>
                  <div class="product-name-transaction">
                    829291092919011
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="info-card-transaction">
                    Total Pembayaran
                  </div>
                  <div class="product-name-transaction">Rp 17.000</div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-3 col-6 text-right">
                  <a href="#" class="btn btn-outline-primary mt-3">
                    Lihat detail Transaksi
                  </a>
                </div>
                <div class="col-sm-4 col-6">
                  <button
                    type="button"
                    class="btn btn-primary mt-3"
                    data-toggle="modal"
                    data-target="#userPayment"
                  >
                    Cara Pembayaran
                  </button>
                </div>
              </div>
            </div>
          </div>

          
          
            {{-- // jika field kosong --}}
            <div class="card">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-sm-5 text-center">
                  <img
                    src="/images/if_empty.svg"
                    alt=""
                    class="align-items-center mt-5 w-75"
                  />
                  <div class="product-name-transaction mt-4">
                    Belum Ada Transaksi
                  </div>
                  <div class="info-card-transaction mt-2">
                    Proses pembayaran transaksi belum ada, silahkan
                    belanja dan dan penuhi kebutuhan !
                  </div>

                  <a href="" class="btn btn-primary mt-3 pr-4 pl-4 mb-5"
                    >Mulai Belanja</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="row"></div>
        </div>
      </div>
    </section>
  </div>
@endsection

