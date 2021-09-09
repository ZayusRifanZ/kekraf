@extends('layouts.dashboard')

@section('title')
  Kekraf - Dashboard Account Setting
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Akun Saya</h1>
        <p>Perbaharui data terbaru profil mu</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="" class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img src="/images/Profil.png" alt="" class="w-100" />
                      <input
                        type="file"
                        id="file"
                        style="display: none"
                        multiple
                      />
                      <button
                        class="btn btn-light btn-block mt-2"
                        onclick="thisFileUpload()"
                      >
                        Ubah Photo Frofil
                      </button>

                      <small id="helpId" class="text-muted"
                        >images-uplodes</small
                      >
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          value="Ujang Maman"
                        />
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          value="ujangmaman@mail.com"
                        />
                      </div>
                      <div class="form-group">
                        <label for="">No. Telepon</label>
                        <input
                          type="text"
                          class="form-control"
                          value="+62 877 6727 8922"
                        />
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Alamat 1</label>
                        <input
                          type="text"
                          class="form-control"
                          value="Papa La Casta"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Alamat 2</label>
                        <input
                          type="text"
                          class="form-control"
                          value="Blok B2 No. 34"
                        />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="" id="" class="form-control">
                          <option value="" disabled>
                            Pilih Provinsi
                          </option>
                          <option value="">Kepulauan Riau</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Kota</label>
                        <select name="" id="" class="form-control">
                          <option value="" disabled>Pilih Kota</option>
                          <option value="">Tanjungpinang</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Kode Pos</label>
                        <input
                          type="number"
                          class="form-control"
                          value="21483"
                        />
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Negara</label>
                        <input
                          type="text"
                          name=""
                          id=""
                          value="Indonesia"
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-primary">
                        Simpan Data
                      </button>
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

