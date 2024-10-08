@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Transaction Detail
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>#{{ $transaction->code }}</h1>
        <p>Transaksi Detail</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content" id="transaction-details">
          <div class="row">
            <div class="col-12">
              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-4">
                      <img
                        src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                        alt=""
                        class="w-100 detail-transaction-img mb-3"
                      />
                    </div>

                    <div class="col-12 col-md-8">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="product-title">Nama Pelanggan</div>
                          <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Nama Produk</div>
                          <div class="product-subtitle">
                            {{ $transaction->product->name }}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">
                            Tanggal Transaksi
                          </div>
                          <div class="product-subtitle">
                            {{ $transaction->created_at }}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Status Pembayaran</div>
                          <div class="product-subtitle text-danger">
                            {{ $transaction->transaction->transactions_status }}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">Jumlah Total</div>
                          <div class="product-subtitle">
                            Rp {{ number_format($transaction->transaction->total_price) }}
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="product-title">No. Telepon</div>
                          <div class="product-subtitle">
                            {{ $transaction->transaction->user->phone_number }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form 
                    action="{{ route('dashboard-transaction-update', $transaction->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12 mb-3">
                        <h2 class="section-title">Informasi Pengiriman</h2>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Alamat 1</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Alamat 2</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_two }}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Provinsi</div>
                        <div class="product-subtitle">
                          {{ App\Models\Province::find( $transaction->transaction->user->provinces_id )->name }}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Kota</div>
                        <div class="product-subtitle">
                          {{ App\Models\Regency::find( $transaction->transaction->user->regencies_id )->name }}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Kode Pos</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->zip_code }}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="product-title">Negara</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->country }}
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="product-title">Status Pengiriman</div>
                        <select
                          name="shipping_status"
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

                  </form>
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
          status: "{{ $transaction->shipping_status }}",
          resi: "{{ $transaction->resi }}",
        },
      });
    </script>
@endpush