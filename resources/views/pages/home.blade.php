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
            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img src="/images/food-tray 1.svg" alt="" class="w-100" />
                </div>
                <p class="category-text">Kuliner</p>
              </a>
            </div>
            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img src="/images/fashion.svg" alt="" class="w-100" />
                </div>
                <p class="category-text">Fasion</p>
              </a>
            </div>
            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img src="/images/bird.svg" alt="" class="w-100" />
                </div>
                <p class="category-text">Kriya</p>
              </a>
            </div>
            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img src="/images/tv&radio.svg" alt="" class="w-100" />
                </div>
                <p class="category-text">Tv & Radio</p>
              </a>
            </div>

            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img src="/images/book.svg" alt="" class="w-100" />
                </div>
                <p class="category-text">Penerbitan</p>
              </a>
            </div>
            <div
              class="col-4 col-md-3 col-lg-2"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="#" class="component-categories d-block">
                <div class="category-icon">
                  <img
                    src="/images/business-and-trade.svg"
                    alt=""
                    class="w-100"
                  />
                </div>
                <p class="category-text">Arsitektur</p>
              </a>
            </div>
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
            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/AbonEbiKriuk.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">Abon Ebi Kriuk</div>
                <div class="product-price">Rp 54.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/AdidasSepatuBasket.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Adidas Sepatu Basket
                </div>
                <div class="product-price">Rp 300.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img src="/images/DayCream.jpg" alt="" class="product-image" />
                </div>
                <div class="product-text text-justify">Day Cream</div>
                <div class="product-price">Rp 55.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/1SetAlatKosmetik.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Satu Set Alat Kosmetik dan Aksesoris
                </div>
                <div class="product-price">Rp 350.000</div>
              </a>
            </div>
            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/KacaMataAntiRadiasi.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Kecamata Anti Radiasi Matahari
                </div>
                <div class="product-price">Rp 50.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/MinumanSehatMagicMidn.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Minuman Sehat Magic Midn Rasa Matcha
                </div>
                <div class="product-price">Rp 200.000</div>
              </a>
            </div>
            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img src="/images/CocaCola.jpg" alt="" class="product-image" />
                </div>
                <div class="product-text text-justify">Coca Cola Original</div>
                <div class="product-price">Rp 12.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="800"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/ParfumMyramK.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">MyriamK Parfum</div>
                <div class="product-price">Rp 250.000</div>
              </a>
            </div>
            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="900"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/HipeasSnack.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">Hippeas Snack</div>
                <div class="product-price">Rp 20.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="1000"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/QuokkaBotolKopi.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Quokka Botol Minum Kopi
                </div>
                <div class="product-price">Rp 300.000</div>
              </a>
            </div>
            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="1100"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/SepatuHeelCorakBunga.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Sepatu Heel Corak Bunga
                </div>
                <div class="product-price">Rp 500.000</div>
              </a>
            </div>

            <div
              class="col-lg-2 col-md-3 col-4 p-1"
              data-aos="fade-up"
              data-aos-delay="1200"
            >
              <a href="/details/1" class="component-products d-block">
                <div class="product-thumnail">
                  <img
                    src="/images/TasSelempangLeisara.jpg"
                    alt=""
                    class="product-image"
                  />
                </div>
                <div class="product-text text-justify">
                  Tas Selempang Leisara
                </div>
                <div class="product-price">Rp 550.000</div>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- tutup produk -->

    </div>
@endsection

