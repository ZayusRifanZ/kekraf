@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Product Detail
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Pensil Mewarnai</h1>
        <p>Detail Produk</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nama Produk</label>
                          <input
                            type="text"
                            class="form-control"
                            value="Pensil Mewarnai"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Harga</label>
                          <input
                            type="text"
                            class="form-control"
                            value="20.000"
                          />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="category" class="form-control">
                            <option value="" disabled>
                              Pilih Kategori
                            </option>
                            <option value="" selected>Shipping</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea name="editor"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 text-right">
                        <button
                          type="submit"
                          class="btn btn-primary px-5 btn-block"
                        >
                          Perbaharui Produk
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 card">
              <div class="card-body row justify-content-center">
                <div class="col-md-2 col-3">
                  <div class="gallery-container">
                    <img src="/images/pencil-1.jpg" alt="" class="w-100" />
                    <a href="#" class="delete-gallery">
                      <img
                        src="/images/remove.svg"
                        alt=""
                        onmouseover="this.src='/images/remove-hover.svg'"
                        onmouseout="this.src='/images/remove.svg'"
                      />
                    </a>
                  </div>
                </div>
                <div class="col-md-2 col-3">
                  <div class="gallery-container">
                    <img src="/images/pencil-2.jpg" alt="" class="w-100" />
                    <a href="#" class="delete-gallery">
                      <img
                        src="/images/remove.svg"
                        alt=""
                        onmouseover="this.src='/images/remove-hover.svg'"
                        onmouseout="this.src='/images/remove.svg'"
                      />
                    </a>
                  </div>
                </div>
                <div class="col-md-2 col-3">
                  <div class="gallery-container">
                    <img src="/images/pencil-3.jpg" alt="" class="w-100" />
                    <a href="#" class="delete-gallery">
                      <img
                        src="/images/remove.svg"
                        alt=""
                        onmouseover="this.src='/images/remove-hover.svg'"
                        onmouseout="this.src='/images/remove.svg'"
                      />
                    </a>
                  </div>
                </div>
                <div class="col-md-2 col-3">
                  <div class="gallery-container">
                    <img src="/images/pencil-4.jpg" alt="" class="w-100" />
                    <a href="#" class="delete-gallery">
                      <img
                        src="/images/remove.svg"
                        alt=""
                        onmouseover="this.src='/images/remove-hover.svg'"
                        onmouseout="this.src='/images/remove.svg'"
                      />
                    </a>
                  </div>
                </div>

                <div class="col-12">
                  <input
                    type="file"
                    id="file"
                    style="display: none"
                    multiple
                  />
                  <button
                    class="btn btn-light btn-block mt-3"
                    onclick="thisFileUpload()"
                  >
                    Tambah Photo
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    CKEDITOR.replace("editor");
  </script>
@endpush