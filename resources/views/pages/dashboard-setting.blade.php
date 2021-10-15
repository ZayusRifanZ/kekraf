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
              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
              <form 
                action="{{ route('dashboard-setting-redirect', 'dashboard-setting-store') }}" 
                method="POST"
                enctype="multipart/form-data"
                class="card"
              >
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Nama Toko</label>
                        <input
                          type="text"
                          name="store_name"
                          class="form-control"
                          value="{{ $user->store_name }}"
                        />
                        @error('store_name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="categories_id">Kategori</label>
                        <select name="categories_id" class="form-control">
                          @if ($user->categories_id == NULL)
                            <option disabled>Pilih Kategori Toko..</option>
                          @else
                            @foreach ($categories as $category)
                                @if ($user->categories_id == $category->id)
                                  <option value="{{ $user->categories_id }}" selected>{{ $category->name }}</option>
                                @endif
                            @endforeach
                          @endif
                          {{-- <option value="{{ $user->categories_id }}" selected>{{ $user->category->name }}</option> --}}
                          @foreach ($categories as $category)
                          @if ($user->categories_id !== $category->id )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        @error('categories_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
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
                            name="store_status"
                            id="openStoreTrue"
                            class="custom-control-input"
                            value="1"
                            {{ $user->store_status == 1 ? 'checked' : '' }}
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
                            name="store_status"
                            id="openStoreFalse"
                            class="custom-control-input"
                            value="0"

                            {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}
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

