@extends('layouts.app')

@section('title')
    Kekraf - Home
@endsection

@section('content')
    <div class="page-content page-home">
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
                    <a href="{{ route('home') }}">Beranda</a>
                  </li>
                  <li class="breadcrumb-item active">Kekraf Store</li>
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

      <section 
        class="kekraf-new-products mt-0"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row mb-4 justify-content-between">
            <div class="col-12">
              <div class="card rounded-lg">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1 col-sm-2 col-3">
                      <img
                        src="{{ Storage::url($products->first()->user->profile_photo) }}"
                        alt=""
                        class="w-100 rounded-circle"
                        style="max-height: 60px"
                      />
                    </div>
                    <div class="col-md-6 col-sm-7 col-9">
                      <div class="store">{{ $products->first()->user->store_name }}</div>
                      <div class="d-flex">
                        @if ($products->first()->user->store_status == '1')
                        <div class="mr-2 badge badge-success">online</div>
                        @else
                        <div class="mr-2 badge badge-danger">tutup</div>
                        @endif
                        <div class="d-inline store-text">
                          <img src="/images/ci_location.svg" alt="" />
                          {{ App\Models\Regency::find( $products->first()->user->regencies_id )->name }}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 col-sm-3 text-right">
                      <div class="store">{{ $products->count() }}</div>
                      <div class="store-text">Produk</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Produk</h5>
            </div>
          </div>

          <div class="row no-gutters">
            @foreach ($products as $product)
            
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
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
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      {{ $product->name }}
                    </div>
                    <div class="product-price">{{ number_format($product->price) }}</div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
            {{-- <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-3 col-4 p-1" data-aos="fade-up">
              <a href="" class="component-products d-block">
                <div class="card">
                  <div class="product-thumnail">
                    <img
                      src="/images/AbonEbiKriuk.jpg"
                      alt=""
                      class="product-image"
                      style="object-fit: cover; width: 175px; height: 175px"
                    />
                  </div>
                  <div class="card-body" style="padding: 0px 10px 20px 10px">
                    <div
                      class="product-text"
                      style="
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                      "
                    >
                      Abon Ebi Kriuk
                    </div>
                    <div class="product-price">Rp 54.000</div>
                  </div>
                </div>
              </a>
            </div> --}}
          </div>

          <div class="row">
            <div class="col-12 mt-4 d-flex justify-content-center">
              {{ $products->links('vendor.pagination.custom') }}
            </div>
          </div>
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