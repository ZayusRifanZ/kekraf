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
                  <div class="dashboard-card-subtitle">{{ number_format($customer) }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Pendapatan</div>
                  <div class="dashboard-card-subtitle">Rp {{ number_format($revenue) }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Transaksi</div>
                  <div class="dashboard-card-subtitle">{{ number_format($transaction_count) }}</div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h2 class="section-title">Riwayat Transaksi</h2>

              @foreach ($transaction_data as $transaction)
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
                      <div class="col-md-4">{{ $transaction->product->name ?? '' }}</div>
                      <div class="col-md-3">{{ $transaction->transaction->user->name ?? '' }}</div>
                      <div class="col-md-3">{{ $transaction->created_at ?? '' }}</div>
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
    </section>
  </div>
@endsection