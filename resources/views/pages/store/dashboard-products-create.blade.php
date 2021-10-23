@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Product Create
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Buat Produk Baru</h1>
        <p>Buat produk mu sendiri</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form 
                action="{{ route('dashboard-product-store') }}"   
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
                          <input type="text" class="form-control" name="name" />
                          @error('name')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Harga</label>
                          <input type="number" class="form-control" name="price"/>
                          @error('price')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="categories_id" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                          <textarea name="description" id="editor"></textarea>
                          @error('description')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Thumnail</label>
                          <input type="file" name="photo[]" class="form-control" multiple/>
                          <p class="text-muted">
                            Kamu dapat memilih lebih dari satu file
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 text-right">
                        <button
                          type="submit"
                          class="btn btn-primary px-5 btn-block"
                        >
                          Simpan data
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
    CKEDITOR.replace("editor");
  </script>
@endpush