@extends('layouts.admin')

@section('title')
    Kekraf - Product Gallery Admin - AddData
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Produk</h1>
        <p>Tambah Galeri Produk</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('product-gallery.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Produk</label>
                        <select name="products_id" class="form-control">
                          @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                          @endforeach
                        </select>
                        @error('products_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Foto Produk</label>
                        <input type="file" name="photos" class="form-control" >
                        @error('photos')
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
