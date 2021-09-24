@extends('layouts.admin')

@section('title')
    Kekraf - Category Admin - edit
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Kategori</h1>
        <p>Edit Kategori {{ $item->name }} 
        </p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('category.update', $item->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Nama Kategori</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" >
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Foto</label>
                        <input type="file" name="photo" class="form-control">
                         @error('photo')
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