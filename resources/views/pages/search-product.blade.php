@extends('layouts.app')

@section('title')
    Kekraf - Search
@endsection

@section('content')
  <div class="page-content page-home">
    {{-- cari Product
    <br>
    {{ $getData->first()->name }} --}}
    <script>
      function DoSubmit(sel){
        if(sel.value !='0') 
        {
          this.form.submit();
          console.log('hai');
        }
      }
    </script>
     @php  
        
      @endphp

    <section class="kekraf-new-products">
      <div class="container">
        @if (isset($products))   
          <div class="row mb-4 mt-2 justify-content-between">
            <div class="col-sm-8 text-search">
              {{-- Menampilkan 1 - 60 barang dari total 4.4jt+ untuk 
              "<b>baju kurung</b>" --}}
              Menampilkan 
              @if ($products->count() !== 0)
                1 - {{ $products->count() }} 
              @else
              0
              @endif
              untuk barang
              "<b>{{ $search }}</b>"
            </div>
            <div class="col-sm-4 text-search-right">
              <form action="{{ route('search') }}" method="GET">
                @csrf
                <input type="hidden" name="search" value="{{ $search }}">
                <b class="mr-2"> urutkan : </b>
                <select
                  name="filter"
                  class="
                    custom-select custom-select-sm
                    form-control
                    w-25
                    d-inline
                  "
                  onchange="this.form.submit();"
                >
                @if ($filter == 0 || $filter == null)  
                  <option value="0" selected>Paling sesuai</option>
                  <option value="1" >Terbaru</option>
                  <option value="2">Harga tertinggi</option>
                  <option value="3">Harga terendah</option>
                @elseif ($filter == 1)
                  <option value="0" >Paling sesuai</option>
                  <option value="1" selected>Terbaru</option>
                  <option value="2">Harga tertinggi</option>
                  <option value="3">Harga terendah</option>
                @elseif ($filter == 2)
                  <option value="0" >Paling sesuai</option>
                  <option value="1" >Terbaru</option>
                  <option value="2" selected>Harga tertinggi</option>
                  <option value="3">Harga terendah</option>
                @elseif ($filter == 3)
                  <option value="0" >Paling sesuai</option>
                  <option value="1" >Terbaru</option>
                  <option value="2" >Harga tertinggi</option>
                  <option value="3" selected>Harga terendah</option>
                @endif
                  {{-- <option value="1" >Terbaru</option>
                  <option value="2">Harga tertinggi</option>
                  <option value="3">Harga terendah</option> --}}
                </select>
                <noscript><input type="submit" value="Submit"/></noscript>
              </form>
            </div>
          </div>

          <div class="row no-gutters">
            @php $incrementProduct = 0; @endphp
              @forelse ($products as $product)
                <div
                  class="col-lg-2 col-md-3 col-4 p-1"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100 }}">
                  <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                    <div class="card">
                      <div class="product-thumnail">
                        <img
                          src="
                            @if ($product->galleries->count())
                              {{ Storage::url($product->galleries->first()->photos) }}
                            @else
                              /images/bgHexEEE.png
                            @endif
                          "
                          alt=""
                          class="product-image"
                          style="object-fit: cover;width: 175px;height: 175px;"
                        />
                      </div>
                      <div class="card-body" style="padding: 0px 10px 20px 10px">

                        <div 
                          class="product-text"
                          style="
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;">
                            {{ $product->name }}
                          </div>
                        <div class="product-price">Rp {{ number_format($product->price) }}</div>
                      </div>
                    </div>
                  </a>
                </div>
                  
              @empty
                <div 
                  class="col-12 text-center py-5" 
                  data-aos="fade-up"
                  data-aos-delay="100">
                  Tidak ada Produk yang ditemukan
                </div>
              @endforelse
            
          </div>

          <div class="row">
            <div class="col-12 mt-4 d-flex justify-content-center">
              {{ $products->links('vendor.pagination.custom') }}
            </div>
          </div>

        @else
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body text-center pt-3 pb-4" >
                  <img src="/images/if_empty.svg" alt="" class="mt-4">
                  <h5 class="mt-2">Oops, produk nggak ditemukan</h5>
                  <div class="text-search mb-5">Silahkan ganti kata kunci yang lainnya</div>
                </div>
              </div>
            </div>
          </div>
        @endif
        
      </div>
    </section>
  </div>
@endsection

@push('addon-style')
  <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
@endpush
