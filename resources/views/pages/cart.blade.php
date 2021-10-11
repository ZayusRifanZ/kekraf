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

          <div class="col-12">
            @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            @endif
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
                @php $total_price = 0; @endphp

                @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 20%">
                      @if ($cart->product->galleries)
                        <img
                          src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                          alt=""
                          class="cart-image"
                        />
                      @else
                        <img src="/images/bgHexEEE.png" alt="" class="cart-image">
                      @endif
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">Toko {{ $cart->user->store_name }}</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Rp {{ number_format($cart->product->price) }}</div>
                      <div class="product-subtitle">IDR</div>
                    </td>
                    <td style="width: 20%">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-romove-cart">
                          Hapus 
                        </button>
                      </form>
                    </td>
                  </tr>

                  @php $total_price += $cart->product->price; @endphp

                @endforeach

                {{-- <tr>
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
                </tr> --}}
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
        <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
          @csrf
          <input type="hidden" name="total_price" value="{{ $total_price }}">
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200" >
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_one">Alamat 1</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_one"
                  name="address_one"
                  value="Setra Duta Cemara"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address_two">Alamat 2</label>
                <input
                  type="text"
                  class="form-control"
                  id="address_two"
                  name="address_two"
                  value="Blok B2 No. 34"
                />
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Provinsi</label>
                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                </select>
                <select v-else class="form-control" ></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">Kota</label>
                <select name="regencies_id" id="regencies_id" class="form-control" v-if="provinces" v-model="regencies_id">
                  <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                </select>
                <select v-else class="form-control" ></select>

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip_code"
                  name="zip_code"
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
                <label for="phone_number">No Hp</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
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
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Pajak</div>
            </div>
            <div class="col-6 col-md-3">
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Asuransi Produk</div>
            </div>
            <div class="col-6 col-md-2">
              <div class="product-title">Rp 0</div>
              <div class="product-subtitle">Kirim ke Jakarta</div>
            </div>
            <div class="col-6 col-md-2">
              <div class="product-title text-success">Rp {{ number_format($total_price ?? 0) }}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-12 col-md-3 mt-2">
              <button 
                type="submit"
                class="btn btn-success btn-block"
              >
                Pesan Sekarang
              </button>
            </div>
          </div>
        </form>
        
      </div>
    </section>
    <!-- tutup cart -->

    
  </div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script src="/vendor/vue/vue-toasted.min.js"></script>
  <script src="/vendor/axios/axios.min.js"></script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        AOS.init();
        this.getProvincesData();
      },
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null,

      },
      methods: {
        getProvincesData() {
          var self = this;
          axios.get('{{ route('api-provinces') }}')
          .then(function(response){
            self.provinces = response.data;
          })
        },
        getRegenciesData() {
          var self = this;
          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function(response){
            self.regencies = response.data;
          })
        }
      },

      watch: {
        provinces_id: function(val, oldVal){
          this.regencies_id = null;
          this.getRegenciesData();
        }
      }
    });
  </script>
@endpush
