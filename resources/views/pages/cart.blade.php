@extends('layouts.app')

@section('title')
    Kekraf - Cart
@endsection

@section('content')
  <div class="page-content page-cart">
    <!-- breadCrumbs -->
    <section
      class="kekraf-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Keranjang</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!-- tutup breadCrumbs -->

    <!-- cart -->
    <section class="kekraf-cart">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-12 table-responsive">
            <table class="table table-borderless table-cart">
              <thead>
                <tr>
                  <th scope="col">Gambar</th>
                  <th scope="col">Produk &amp; Seller</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Menu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 20%">
                    <img
                      src="/images/pencil-1.jpg"
                      alt=""
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">Pencil</div>
                    <div class="product-subtitle">Toko Naura_store</div>
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">Rp 20.000</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 20%">
                    <a href="#" class="btn btn-romove-cart">Hapus </a>
                  </td>
                </tr>
                <tr>
                  <td style="width: 20%">
                    <img
                      src="/images/CocaCola.jpg"
                      alt=""
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">CocaCola</div>
                    <div class="product-subtitle">Toko drinkandfood</div>
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">Rp 12.000</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 20%">
                    <a href="#" class="btn btn-romove-cart">Hapus </a>
                  </td>
                </tr>
                <tr>
                  <td style="width: 20%">
                    <img
                      src="/images/QuokkaBotolKopi.jpg"
                      alt=""
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">Quokka Botol Minum Kopi</div>
                    <div class="product-subtitle">Toko Quokka_store</div>
                  </td>
                  <td style="width: 35%">
                    <div class="product-title">Rp 300.000</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 20%">
                    <a href="#" class="btn btn-romove-cart">Hapus </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Rincian Pengiriman</h2>
          </div>
        </div>
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressOne">Alamat 1</label>
              <input
                type="text"
                class="form-control"
                id="addressOne"
                name="addressOne"
                value="Setra Duta Cemara"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressTwo">Alamat 2</label>
              <input
                type="text"
                class="form-control"
                id="addressTwo"
                name="addressTwo"
                value="Blok B2 No. 34"
              />
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="province">Provinsi</label>
              <select name="province" id="province" class="form-control">
                <option value="West Java">West Java</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="city">Kota</label>
              <select name="city" id="city" class="form-control">
                <option value="Bandung">Bandung</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="postalCode">Kode Pos</label>
              <input
                type="text"
                class="form-control"
                id="postalCode"
                name="postalCode"
                value="123999"
              />
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="country">Negara</label>
              <input
                type="text"
                class="form-control"
                id="country"
                name="country"
                value="Indonesia"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mobile">No Hp</label>
              <input
                type="text"
                class="form-control"
                id="mobile"
                name="mobile"
                value="+628 2020 11111"
              />
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-2">Informasi Pembayaran</h2>
          </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-6 col-md-2">
            <div class="product-title">Rp 10</div>
            <div class="product-subtitle">Pajak</div>
          </div>
          <div class="col-6 col-md-3">
            <div class="product-title">Rp 2.800</div>
            <div class="product-subtitle">Asuransi Produk</div>
          </div>
          <div class="col-6 col-md-2">
            <div class="product-title">Rp 36.000</div>
            <div class="product-subtitle">Kirim ke Jakarta</div>
          </div>
          <div class="col-6 col-md-2">
            <div class="product-title text-success">Rp 370.810</div>
            <div class="product-subtitle">Total</div>
          </div>
          <div class="col-12 col-md-3 mt-2">
            <a href="{{ route('success') }}" class="btn btn-success btn-block"
              >Pesan Sekarang</a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- tutup cart -->

    
  </div>
@endsection

