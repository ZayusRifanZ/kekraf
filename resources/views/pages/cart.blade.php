@extends('layouts.app')
{{-- modal --}}
@extends('includes.modals.changeShippingAddress')

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
                  <th scope="col">Berat &amp; Qty</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Menu</th>
                </tr>
              </thead>
              @php $total_price = 0; @endphp 
              @foreach ($store_name_arr as $data_store)
                <tbody>
                  @foreach ($carts as $cart )
                    @if ($cart->product->user->store_name === $data_store)                      
                      <tr>
                        <td style="width: 15%">
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
                          <div class="product-subtitle">
                            Toko {{ $cart->product->user->store_name }}
                          </div>
                          <div class="product-subtitle">
                            kota {{ $cart->product->user->regencies_id }}
                          </div>
                        </td>
                        <td style="width: 15%">
                          <div class="product-title">{{ $cart->qty }}</div>
                          <div class="product-subtitle">
                            {{ $cart->product->weight * $cart->qty }} gram</div>
                        </td>
                        <td style="width: 20%">
                          <div class="product-title">Rp {{ number_format($cart->product->price * $cart->qty) }}</div>
                          <div class="product-subtitle">IDR</div>
                        </td>
                        <td style="width: 15%">
                          <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-romove-cart">
                              Hapus 
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endif

                    
                    @php $total_price += $cart->product->price * $cart->qty; @endphp                      
                  @endforeach
                  @if ($user->regencies_id == NULL)
                    <tr style="background-color: #f66571">
                      <td colspan="5" class="text-center text-white rounded-lg">
                        Rincian pengiriman harus diisi
                      </td>
                    </tr>
                  @else
                    <tr class="bg-success">
                      <td colspan="5" class="text-white">
                        <div class="row">
                          <div class="col-4">
                            <form action="{{ route('cart') }}" method="GET">
                              @csrf
                              
                              <input type="hidden" name="location_origin" value="{{ $carts->first->product->user->regencies_id }}">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="kurir">Kurir </label>
                                </div>
                               
                                <select class="custom-select" id="kurir" name="kurir" onchange="this.form.submit()">
                                  <option disabled selected>Pilih...</option>
                                  @foreach ($couriers as $item)
                                    <option value="{{ $item->code }}">{{ $item->title }}</option>
                                  @endforeach
                                </select>
                                {{-- @php
                                $dataongkir = RajaOngkir::ongkosKirim([
                                  'origin'        => 12,     // ID kota/kabupaten asal
                                  'destination'   => 12,      // ID kota/kabupaten tujuan
                                  'weight'        => 1300,    // berat barang dalam gram
                                  'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
                                ]);
                                $dom = new DOMDocument();
                                $option_tag = $dom->getElementsByName('option');
                                dd($option_tag);
                              @endphp --}}
                              </div>
                            </form>
                            
                          </div>
                          <div class="col-5">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="layanan">Jenis Layanan</label>
                              </div>
                              <select class="custom-select" id="layanan">
                                <option selected>Choose...</option>
                                <option value="">Reguler Service</option>
                                <option value="">ONS (Over Night Service)</option>
                                <option value="">Paket Kitat Khusus</option>
                              </select>
                            </div>
                            
                          </div>
                          <div class="col-3">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ongkos Kirim</span>
                              </div>
                              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value=" +Rp90.000" disabled>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endif
                </tbody>
                
              @endforeach
              
            </table>
          </div>
        </div>

        
        

        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-7">
            <h2 class="mb-2">Alamat pengiriman</h2>
          </div>
          <div class="col-5">
            <h2 class="mb-2">Rincian Pembayaran</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="card">
              <div class="card-body">
                <span>
                  {{ $user->phone_number }} 
                </span> <br>
                <span>
                  {{ $addres_detail }}
                </span> <br>
                <span>
                  {{ $city }}, 
                  {{ $user->zip_code }} 
                </span>
                <br>
                <button 
                  class="btn btn-primary btn-sm mt-2" 
                  data-toggle="modal" 
                  data-target="#changeShippingAddress"
                >
                  Ubah alamat
                </button>
              </div>
            </div>
          </div>
          @php
            $cart = \App\Cart::where('users_id', Auth::user()->id)->sum('qty');
          @endphp
          <div class="col-5">
            <div class="card">
              <div class="card-body">
                <div class="product-subtitle">Total harga ({{ $cart ?? 0 }} barang)</div>
                <div class="product-title text-primary">
                  Rp {{ number_format($total_price ?? 0) }}
                </div>
              </div>
            </div>
            <button 
              type="submit"
              class="btn btn-primary btn-block"
            >
              Pesan Sekarang
            </button>                
          </div>
        </div>

        {{-- <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Rincian Pengiriman</h2>
          </div>
        </div> --}}
        {{-- <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
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
                  value="{{ $user->address_one }}"
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
                  value="{{ $user->address_one }}"
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

          
        </form> --}}
        
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
