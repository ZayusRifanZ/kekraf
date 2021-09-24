@extends('layouts.admin')

@section('title')
    Kekraf - User Admin - AddData
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Pengguna</h1>
        <p>Tambah Penguna Baru</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('user.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Nama Pengguna</label>
                        <input type="text" name="name" class="form-control" >
                         @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Email Pengguna</label>
                        <input type="text" name="email" class="form-control" >
                         @error('email')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Password Pengguna</label>
                        <input type="password" name="password" class="form-control" >
                         @error('password')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Role</label>
                        <select name="roles" class="form-control">
                          <option value="" selected disabled>Pilih..</option>
                          <option value="ADMIN">Admin</option>
                          <option value="USER">User</option>
                        </select>
                         @error('roles')
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