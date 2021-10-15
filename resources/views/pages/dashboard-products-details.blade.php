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
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form 
                action="{{ route('dashboard-product-update', $product->id) }}" 
                method="POST" 
                enctype="multipart/form-data"
              >
                @csrf
                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nama Produk</label>
                          <input
                            type="text"
                            class="form-control"
                            value="{{ $product->name }}"
                            name="name"
                          />
                          @error('name')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Harga</label>
                          <input
                            type="text"
                            class="form-control"
                            value="{{ $product->price }}"
                            name="price"
                          />
                          @error('price')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="categories_id" class="form-control">
                            <option value="{{ $product->categories_id }}" selected>{{ $product->category->name }}</option>
                            @foreach ($categories as $category)
                            @if ($product->categories_id !== $category->id )
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                          </select>
                          @error('categories_id')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea id="editor" name="description">{!! $product->description !!}</textarea>
                          @error('description')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
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
            <div class="col-12 ">
              <div class="card">
                <div class="card-body row justify-content-center">
                  @foreach ($product->galleries as $gallery)
                    <div class="col-md-2 col-3">
                      <div class="gallery-container">
                        <img src="{{ Storage::url($gallery->photos) ?? '' }}" alt="" class="w-100" />
                        <a 
                          href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" 
                          class="delete-gallery"
                        >
                          <img
                            src="/images/remove.svg"
                            alt=""
                            onmouseover="this.src='/images/remove-hover.svg'"
                            onmouseout="this.src='/images/remove.svg'"
                          />
                        </a>
                      </div>
                    </div>
                  @endforeach
                  
                  <div class="col-12">
                    <form 
                      action="{{ route('dashboard-product-gallery-upload') }}"
                      method="POST"
                      enctype="multipart/form-data"
                    >
                    @csrf
                      <input type="hidden" name="products_id" value="{{ $product->id }}">
                      <input
                        type="file"
                        id="file"
                        name="photos"
                        style="display: none"
                        {{-- multiple --}}
                        onchange="form.submit()"
                      />
                      <button
                        type="button"
                        class="btn btn-light btn-block mt-3"
                        onclick="thisFileUpload()"
                      >
                        Tambah Photo
                      </button>
                    
                    </form>

                  </div>
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