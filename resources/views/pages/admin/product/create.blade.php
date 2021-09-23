@extends('layouts.admin')

@section('title')
    Kekraf - Product Admin - AddData
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Produk</h1>
        <p>Tambah Produk Baru</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              {{-- @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif --}}
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('product.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Nama Produk</label>
                        <input type="text" name="name" class="form-control" >
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Pemilik Produk</label>
                        <select name="users_id" class="form-control">
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                        </select>
                        @error('users_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Kategori Produk</label>
                        <select name="categories_id" class="form-control">
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
                        <label >Harga Produk</label>
                        <input type="number" name="price" class="form-control" >
                        @error('price')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Deskripsi Produk</label>
                        <textarea name="description" id="editor"></textarea>
                        @error('description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-primary px-5">
                        Simpan Data
                      </button>
                    </div>
                  </div>
                </form>
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
    CKEDITOR.replace("editor");
  </script>
@endpush