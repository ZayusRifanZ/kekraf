@extends('layouts.dashboard')

@section('title')
    Kekraf - Dashboard Setting
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Setting Toko</h1>
        <p>Jadikan toko itu menguntungkan mu</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="" class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input
                          type="text"
                          name=""
                          id=""
                          class="form-control"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="" id="" class="form-control">
                          <option value="" disabled>
                            Pilih Kategori
                          </option>
                          <option value="">satu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Status Toko</label>
                        <p class="text-muted">
                          Apakah saat ini toko anda buka
                        </p>
                        <div
                          class="
                            custom-control
                            custom-radio
                            custom-control-inline
                          "
                        >
                          <input
                            type="radio"
                            name="is_store_open"
                            id="openStoreTrue"
                            class="custom-control-input"
                            value="true"
                          />
                          <label
                            for="openStoreTrue"
                            class="custom-control-label"
                          >
                            Buka
                          </label>
                        </div>
                        <div
                          class="
                            custom-control
                            custom-radio
                            custom-control-inline
                          "
                        >
                          <input
                            type="radio"
                            name="is_store_open"
                            id="openStoreFalse"
                            class="custom-control-input"
                            value="false"
                          />
                          <label
                            for="openStoreFalse"
                            class="custom-control-label"
                          >
                            Sementara Tutup
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col text-right">
                      <button type="submit" class="btn btn-primary">
                        Simpan data
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

