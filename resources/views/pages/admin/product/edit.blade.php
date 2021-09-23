@extends('layouts.admin')

@section('title')
    Kekraf - Product Admin - edit
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Produk</h1>
        <p>Edit Data Produk - {{ $item->name }} 
        </p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('product.update', $item->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Pemilik Produk</label>
                        <select name="users_id" class="form-control">
                          <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                          @foreach ($users as $user)
                            @if ($item->users_id != $user->id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
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
                          <option value="{{ $item->categories_id }}" selected>{{ $item->category->name }}</option>
                          @foreach ($categories as $category)
                            @if ($item->categories_id != $category->id)
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
                        <label >Harga Produk</label>
                        <input type="number" name="price" class="form-control" value="{{ $item->price }}" >
                        @error('price')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Deskripsi Produk</label>
                        <textarea name="description" id="editor">{!! $item->description !!}</textarea>
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