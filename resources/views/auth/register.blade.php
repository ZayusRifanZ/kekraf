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
              
              <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label for="name">Nama panjang</label>
                  <input 
                    v-model="name"
                    id="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    value="{{ old('name') }}" 
                    autocomplete="name" 
                    autofocus
                  >
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input 
                    v-model="email"
                    @change="checkForEmailAvailability()"
                    v-on:keytab="checkForEmailAvailability()"
                    id="email" 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    :class="{ 'is-invalid': this.email_unavailable }"
                    name="email" 
                    value="{{ old('email') }}"
                    autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input 
                    id="password" 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" 
                    required 
                    autocomplete="new-password" >

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input 
                    id="password-confirm" 
                    type="password" 
                    class="form-control"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password">
                </div>
                <div class="form-group">
                  <label for="">Toko</label>
                  <p class="text-muted">
                    Apakah anda ingin membuka toko ?
                  </p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label for="openStoreTrue" class="custom-control-label"
                      >Iya, boleh
                    </label>
                  </div>

                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label for="openStoreFalse" class="custom-control-label">
                      Tidak
                    </label>
                  </div>
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label for="">Nama Toko</label>
                  <input 
                    v-model="store_name" 
                    id="store_name" 
                    type="text" 
                    class="form-control @error('store_name') is-invalid @enderror" 
                    name="store_name"
                    value="{{  old('store_name') }}"
                    required
                    autocomplete
                    autofocus>
                  {{-- @error('store_name') --}}
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label for="">Kategori</label>
                  <select name="categories_id" class="form-control">
                    <option value="" disabled selected>Pilih kategori</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <button
                  type="submit"
                  class="btn btn-primary btn-block mb-3"
                  :disabled="this.email_unavailable"
                  >Daftar</button
                >
                <span> Sudah memiliki akun kekraf ? </span>
                <a href="{{ route('login') }}" class="">Masuk</a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection

@push('addon-script')

  <script src="/vendor/vue/vue.js"></script>
  {{-- <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
  <script src="/vendor/vue/vue-toasted.min.js"></script>
  <script src="/vendor/axios/axios.min.js"></script>

  <script>
    Vue.use(Toasted);
    var register = new Vue({
      el: "#register",
      mounted() {
        AOS.init(); 
      },
      methods: {
        checkForEmailAvailability: function () {
          var self = this;
          axios.get('{{ route('api-register-check') }}', {
            params: {
              email: this.email
            }
          })
          .then(function (response) {
            if(response.data == 'Available') {
              self.$toasted.show(
                "Email anda tersedia! silahkan lanjut pada tahap selanjutnya!",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 2000,
                }
              );
              self.email_unavailable = false;
            } else {
              self.$toasted.error(
                "Maaf email yang anda masukkan sudah terdaftar di sistem kami",
                {
                  position: "top-center",
                  className: "rounded",
                  duration: 2000,
                }
              );
              self.email_unavailable = true;
            }
            // handle success
            console.log(response);
          })

          .catch(function (error) {
            // handle error
            console.log(error);
          })

          
        }
      },
      data() {
        return {
          name: "Full Name",
          email: "test@example.com",
          is_store_open: true,
          store_name: "",
          email_unavailable: false
        }
      }
    });

  </script>
    
@endpush
