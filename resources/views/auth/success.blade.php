@extends('layouts.success')

@section('title')
    Kekraf - Success
@endsection

@section('content')
  <div class="page-content page-success">
    <section class="kekraf-success" data-aos="zoom-in">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 text-center">
            <img src="/images/success.svg" alt="" class="mb-4" />
            <h2>Selamat datang di Kekraf</h2>
            <p>
              kamu sudah terdaftar di sistem kami, silahkan ke dashboard atau
              mulai berbelanja
            </p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block mt-5"
              >Dashboard</a
            >
            <a href="{{ route('log-home') }}" class="btn btn-cultured btn-block"
              >Mulai Belanja</a
            >
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

