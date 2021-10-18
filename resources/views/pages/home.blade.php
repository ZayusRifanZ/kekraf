@extends('layouts.app')

@section('title')
    Kekraf - Home
@endsection

@section('content')
    <div class="page-content page-home">
      <!-- sliding image -->
      <section class="kekraf-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div
                id="kekrafCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#kekrafCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#kekrafCarousel" data-slide-to="1"></li>
                  <li data-target="#kekrafCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="/images/banner.jpg"
                      alt=""
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      alt=""
                      class="d-block w-100"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/images/banner.jpg"
                      alt=""
                      class="d-block w-100"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- tutup slide -->

      <!-- categori -->
      <section class="kekraf-category-product">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Kategori Teratas</h5>
            </div>
          </div>

          <div class="row">
            @php $incrementCategory = 0; @endphp
            @forelse ($categories as $category )
              <div
                class="col-4 col-md-3 col-lg-2"
                data-aos="fade-up"
                data-aos-delay="{{ $incrementCategory += 100 }}"
              >
                <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                  <div class="category-icon">
                    <img 
                      src="{{ Storage::url($category->photo) }}" 
                      alt="Gambar Kategori" 
                      class="w-100"
                       />
                  </div>
                  <p class="category-text">{{ $category->name }}</p>
                </a>
              </div>
                
              @empty

              <div 
                class="col-12 text-center py-5" 
                data-aos="fade-up"
                data-aos-delay="100">
                Tidak ada Kategori yang ditemukan
              </div>
            @endforelse
            
          </div>
        </div>
      </section>
      <!-- tutup categori -->

      <!-- produk -->
      <section class="kekraf-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Produk KEKRAF</h5>
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
        </div>
      </section>
      <!-- tutup produk -->

    </div>
@endsection

