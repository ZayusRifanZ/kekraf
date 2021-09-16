@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Transaction Detail
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>#KEKRAF0839</h1>
        <p>Transaksi Detail</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content" id="transaction-details">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <img
                        src="/images/SepatuHeelCorakBunga.jpg"
                        alt=""
                        class="w-100 detail-transaction-img mb-3"
                      />
                    </div>

                    <div class="col-12 col-md-8">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="product-title">Nama Pelanggan</div>
                          <div class="product-subtitle">Surti</div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Nama Produk</div>
                          <div class="product-subtitle">
                            Sepatu Heel Corak Bunga
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">
                            Tanggal Transaksi
                          </div>
                          <div class="product-subtitle">
                            12 Januari 2020
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Status Pembayaran</div>
                          <div class="product-subtitle text-danger">
                            Pending
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Jumlah Total</div>
                          <div class="product-subtitle">Rp 280,409</div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">No. Telepon</div>
                          <div class="product-subtitle">
                            +628 2020 11111
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 mb-3">
                      <h2 class="section-title">Informasi Pengiriman</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Alamat 1</div>
                      <div class="product-subtitle">
                        Setra Duta Cemara
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Alamat 2</div>
                      <div class="product-subtitle">Blok B3 No 36</div>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Provinsi</div>
                      <div class="product-subtitle">Kepulauan Riau</div>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Kota</div>
                      <div class="product-subtitle">Tanjungpinang</div>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Kode Pos</div>
                      <div class="product-subtitle">21484</div>
                    </div>
                    <div class="col-md-6">
                      <div class="product-title">Negara</div>
                      <div class="product-subtitle">Indonesia</div>
                    </div>
                    <div class="col-md-3">
                      <div class="product-title">Status Pengiriman</div>
                      <select
                        name="status"
                        id="status"
                        class="form-control"
                        v-model="status"
                      >
                        <option value="PENDING">Pending</option>
                        <option value="SHIPPING">Shipping</option>
                        <option value="SUCCESS">Success</option>
                      </select>
                    </div>
                    <template v-if="status == 'SHIPPING'">
                      <div class="col-md-3">
                        <div class="product-title">Input Resi</div>
                        <input
                          type="text"
                          class="form-control"
                          name="resi"
                          v-model="resi"
                        />
                      </div>
                      <div class="col-md-3">
                        <button
                          type="submit"
                          class="btn btn-outline-primary btn-block mt-4"
                        >
                          Update Resi
                        </button>
                      </div>
                    </template>
                  </div>
                  <div class="row mt-4">
                    <div class="col text-right">
                      <button
                        type="submit"
                        class="btn btn-primary btn-lg mt-4"
                      >
                        Save Now
                      </button>
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

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transaction-details",
        data: {
          status: "SHIPPING",
          resi: "BDO12308012132",
        },
      });
    </script>
@endpush