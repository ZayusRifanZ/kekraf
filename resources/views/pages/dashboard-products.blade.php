@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Product
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Produk Saya</h1>
        <p>kelola dengan baik dan dapatkan uang</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row mt-4">
            <div class="col-md-12">
               @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <a
                href="{{ route('dashboard-product-create') }}"
                class="btn btn-primary btn-block"
              >
                <i class="fas fa-plus"></i>
                Tambah produk
              </a>
            </div>
          </div>
          <div class="row mt-4">
            @foreach ($products as $product)
              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a
                  href="{{ route('dashboard-product-detail', $product->id) }}"
                  class="card card-dashboard-product d-block"
                >
                  <div class="card-body">
                    <img
                      src="{{ Storage::url($product->galleries->first()->photos ?? '') }}"
                      alt="img-card-1"
                      class="w-100 mb-2 img-card-custom"
                    />
                    <div class="product-title">{{ $product->name }}</div>
                    <div class="product-category">{{ $product->category->name }}</div>
                  </div>
                </a>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection