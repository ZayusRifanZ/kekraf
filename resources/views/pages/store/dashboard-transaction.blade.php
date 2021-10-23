@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Transaction
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Transaksi</h1>
        <p>Hasil besar dimulai dari yang kecil</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a
                    href="#pills-sell"
                    class="nav-link active"
                    id="pills-sell-tab"
                    data-toggle="pill"
                    role="tab"
                    aria-controls="pills-sell"
                    aria-selected="true"
                    >Jual Produk</a
                  >
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    href="#pills-buy"
                    class="nav-link"
                    id="pills-buy-tab"
                    data-toggle="pill"
                    role="tab"
                    aria-controls="pills-buy"
                    aria-selected="false"
                    >Beli Produk</a
                  >
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="pills-sell"
                  role="tabpanel"
                  area-labelledby="pills-sell-tab"
                >
                  @foreach ($sellTransactions as $transaction)
                    <a
                      href="{{ route('dashboard-transaction-detail', $transaction->id) }}"
                      class="card card-list d-blok mb-2"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                              alt=""
                              class="w-100"
                            />
                          </div>
                          <div class="col-md-4">{{ $transaction->product->name }}</div>
                          <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                          <div class="col-md-3">{{ $transaction->created_at }}</div>
                          <div class="col-md-1 d-none d-md-block">
                            <i class="fas fa-arrow-right"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                  
                  @endforeach
                  
                </div>

                <div
                  class="tab-pane fade"
                  id="pills-buy"
                  role="tabpanel"
                  area-labelledby="pills-buy-tab"
                >
                  @foreach ($buyTransactions as $transaction)
                    <a
                      href="{{ route('dashboard-transaction-detail', $transaction->id) }}"
                      class="card card-list d-blok mb-2"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img
                              src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                              alt=""
                              class="w-100"
                            />
                          </div>
                          <div class="col-md-4">{{ $transaction->product->name }}</div>
                          <div class="col-md-3">{{ $transaction->product->user->store_name }}</div>
                          <div class="col-md-3">{{ $transaction->created_at }}</div>
                          <div class="col-md-1 d-none d-md-block">
                            <i class="fas fa-arrow-right"></i>
                          </div>
                        </div>
                      </div>
                    </a>
                  
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection