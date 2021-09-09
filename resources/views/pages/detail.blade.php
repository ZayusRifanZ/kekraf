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
            <div class="product">Pensil tulis dan warna warni</div>
            <a href="#" class="store d-block">Kunjungi Toko Naura_store</a>

            <div class="pricing">
              <span class="price">Rp 20.000,00</span>
              <span class="sum-buying">Terjual 18,2rb</span>
            </div>

            <div class="description text-justify">
              <p>
                12 Pcs pensil, diasah, pensil HB #2 yang terbuat dari kayu
                berkualitas tinggi untuk penajaman yang bersih dan mudah.
              </p>
              <p>
                Penghapus lembut, bebas noda, bebas lateks yang diamankan di
                ujungnya untuk menghapus kesalahan dengan mudah.
              </p>
              <p>
                JAMINAN PENGEMBALIAN PRODUSEN: Kami melakukan yang terbaik
                untuk menawarkan produk yang lebih baik. Jika Anda tidak puas
                dengan produk kami karena alasan apa pun, silakan hubungi
                kami, kami akan dengan senang hati mengganti unit Anda atau
                menawarkan pengembalian dana penuh!
              </p>
            </div>

            <a
              href="{{ route('cart') }}"
              class="btn btn-custom-primary px-4 text-white d-block mb-3"
            >
              Tambah ke keranjang
            </a>
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
          {
            id: 1,
            url: "/images/pencil-1.jpg",
          },
          {
            id: 2,
            url: "/images/pencil-2.jpg",
          },
          {
            id: 3,
            url: "/images/pencil-3.jpg",
          },
          {
            id: 4,
            url: "/images/pencil-4.jpg",
          },
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

