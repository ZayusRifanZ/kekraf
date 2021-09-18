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
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
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
                        <label >Nama User</label>
                        <input type="text" name="name" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Email User</label>
                      <input type="email" name="email" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Password User</label>
                      <input type="password" name="password" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Role</label>
                        <select name="roles" required class="form-control">
                          <option value="ADMIN">Admin</option>
                          <option value="USER">User</option>
                        </select>
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