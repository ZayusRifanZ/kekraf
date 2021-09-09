@extends('layouts.auth')

@section('title')
    Kekraf - register
@endsection

@section('content')

    <div class="page-content page-auth" id="register">
      <section class="kekraf-login">
        <div class="container">
          <div class="row justify-content-center row-login">
            <div class="col-lg-4">
              <h5 class="text-center">Buat akun anda</h5>
              <form action="" class="mt-3">
                <div class="form-group">
                  <label for="">Nama panjang</label>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control is-valid"
                    v-model="name"
                    autofocus
                  />
                </div>
                <div class="form-group">
                  <label for="">Alamat Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control is-invalid"
                    v-model="email"
                  />
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    v-model="password"
                  />
                </div>
                <div class="form-group">
                  <label for="">Toko</label>
                  <p class="text-muted">Apakah anda ingin membuka toko ?</p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      name="is_store_open"
                      id="openStoreTrue"
                      class="custom-control-input"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label for="openStoreTrue" class="custom-control-label"
                      >Iya, boleh</label
                    >
                  </div>

                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      name="is_store_open"
                      id="openStoreFalse"
                      class="custom-control-input"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label for="openStoreFalse" class="custom-control-label"
                      >Tidak</label
                    >
                  </div>
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label for="">Nama Toko</label>
                  <input type="text" name="" id="" class="form-control" />
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label for="">Kategori</label>
                  <select name="" id="" class="form-control">
                    <option value="">Pilih kategori</option>
                  </select>
                </div>
                <a
                  href="{{ route('register-success') }}"
                  class="btn btn-primary btn-block mb-3"
                  >Daftar</a
                >
                <span> Sudah memiliki akun kekraf ? </span>
                <a href="{{ route('login') }}" class="">Masuk</a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
<div class="container " style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script>
    Vue.use(Toasted);
    var register = new Vue({
      el: "#register",
      mounted() {
        AOS.init();
        this.$toasted.error(
          "Maaf email yang anda masukkan sudah terdaftar di sistem kami",
          {
            position: "top-center",
            className: "rounded",
            duration: 2000,
          }
        );
      },
      data: {
        name: "Zayus Rifan Zafarani",
        email: "zayus@example.com",
        password: "",
        is_store_open: true,
        store_name: "",
      },
    });
  </script>
    
@endpush
