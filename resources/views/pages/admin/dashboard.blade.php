@extends('layouts.admin')

@section('title')
    Kekraf - Dashboard Admin
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Admin Dashboard</h1>
        <p>Selamat datang di Kekraf Administrator Panel</p>
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
                  <div class="dashboard-card-subtitle"> Rp {{ number_format($revenue) }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="card-body">
                  <div class="dashboard-card-title">Transaksi</div>
                  <div class="dashboard-card-subtitle">{{ number_format($transaction) }}</div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </section>
  </div>
@endsection