@extends('layouts.app')

@section('title')
    Kekraf - Detail
@endsection

@section('content')
  <div class="page-content page-detail">
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
                <li class="breadcrumb-item active">Detail Produk</li>
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

    <!-- categori -->
    <section class="kekraf-detail">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" id="gallery">
            <transition name="slide-fade" mode="out-in">
              <img
                :src="photos[activePhoto].url"
                :key="photos[activePhoto].id"
                alt=""
                class="w-100 main-image"
                data-aos="zoom-in"
              />
            </transition>

            <div class="horizontal-scrollable">
              <div class="mt-2 row no-gutters flex-nowrap">
                <div
                  class="col-3"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      alt=""
                      class="w-100 p-1 thumbnail-image"
                      :class="{active: index == activePhoto}"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up">
            <div class="product">{{ $product->name }}</div>
            <a href="#" class="store d-block">Kunjungi Toko {{ $product->user->store_name }}</a>

            <div class="pricing">
              <span class="price">Rp {{ number_format($product->price) }}</span>
              <span class="sum-buying">Terjual 18,2rb</span>
            </div>

            <div class="description text-justify">
              {!! $product->description !!}
            </div>
            @auth
              <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button
                  type="submit"
                  class="btn btn-custom-primary px-4 text-white btn-block mb-3"
                >
                  Tambah ke keranjang
                </button>
              </form>
            @else
              <a
                href="{{ route('login') }}"
                class="btn btn-custom-primary px-4 text-white d-block mb-3"
              >
                Masuk untuk menambahkan
              </a>
            @endauth
          </div>
        </div>
      </div>
    </section>

    <!-- tutup categori -->

    <!-- produk -->
    <section class="store-review" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8 mt-3 mb-3">
            <h5>Customer Review (3)</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8">
            <ul class="list-unstyled">
              <li class="media">
                <img
                  src="/images/icons-testimonial-1.png"
                  alt="testimonial-1"
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Hazza Risky</h5>
                  I thought it was not good for living room. I really happy to
                  decided buy this product last week now feels like homey.
                </div>
              </li>
              <li class="media">
                <img
                  src="/images/icons-testimonial-2.png"
                  alt="testimonial-1"
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                  Color is great with the minimalist concept. Even I thought
                  it was made by Cactus industry. I do really satisfied with
                  this.
                </div>
              </li>
              <li class="media">
                <img
                  src="/images/icons-testimonial-3.png"
                  alt="testimonial-1"
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                  When I saw at first, it was really awesome to have with.
                  Just let me know if there is another upcoming product like
                  this.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- tutup produk -->
  </div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>

  <script>
    var gallery = new Vue({
      el: "#gallery",
      mounted() {
        AOS.init();
      },
      data: {
        activePhoto: 0,
        photos: [
          @foreach ($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
          @endforeach
        ],
      },
      methods: {
        changeActive(id) {
          this.activePhoto = id;
        },
      },
    });
  </script>
    
@endpush

