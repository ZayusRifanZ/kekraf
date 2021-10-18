@extends('layouts.dashboard-user')

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
            <div class="col-md-6">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <img 
                        src="{{ Storage::url('assets/user/user_default.svg') }}"  
                        alt="profile-photo"
                        class="rounded-circle w-100"
                      >
                    </div>
                    <div class="col-10">
                      <div class="dashboard-card-title">Hi Zayus, sekarang kamu sebagai</div>
                      <div class="dashboard-card-subtitle" style="font-size: 20px; font-weight: 500">
                        Member Kekraf
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">
                    Transaksi
                    <button class="btn"> Selama {{ date('Y') }}</button>
                  </div>
                  <div class="dashboard-card-subtitle" 
                  {{-- style="font-size: 20px; font-weight: 500" --}}
                  >
                    Rp {{ number_format(200000) }}
                  </div>
                </div>
              </div>
            </div>
            
          </div>

          <div class="row mt-3">
            <div class="col-12 mt-2">
              <h2 class="section-title">Riwayat Transaksi</h2>

              {{-- @foreach ($transaction_data as $transaction)
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
              @endforeach --}}

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('prepend-style')
  <style>
    .dashboard-card-subtitle{
      font-size: 20px; 
      font-weight: 500;
    }
  </style>
@endpush