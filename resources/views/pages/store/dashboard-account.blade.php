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
              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
              <div class="card">
                
                <form 
                  action="{{ route('dashboard-setting-redirect', 'dashboard-setting-account') }}" 
                  method="POST"
                  enctype="multipart/form-data"
                  id="locations">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <img src="{{ Storage::url(Auth::user()->profile_photo ?? '') }}" alt="" class="w-100" />
                        <input
                          type="file"
                          id="file"
                          name="profile_photo"
                          style="display: none"
                          multiple
                          onchange="showName()"
                        />
                        <label 
                          for="file"
                          class="btn btn-light btn-block mt-2" 
                          onclick="thisFileUpload()"
                        >
                          Ubah Foto Profil
                        </label>
                                               
                      </div>
                      
                      <div class="col-md-9">
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ $user->name }}"
                          />
                        </div>
                        <div class="form-group">
                          <label for="">Email</label>
                          <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ $user->email }}"
                          />
                        </div>
                        <div class="form-group">
                          <label for="phone_number">No. Telepon</label>
                          <input
                            type="text"
                            id="phone_number"
                            name="phone_number"
                            class="form-control"
                            value="{{ $user->phone_number }}"
                          />
                        </div>
                      </div>
  
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_one">Alamat 1</label>
                          <input
                            type="text"
                            id="address_one"
                            name="address_one"
                            class="form-control"
                            value="{{ $user->address_one }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="address_two">Alamat 2</label>
                          <input
                            type="text"
                            id="address_two"
                            name="address_two"
                            class="form-control"
                            value="{{ $user->address_two }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="provinces_id">Provinsi</label>
                          <select 
                            name="provinces_id" 
                            id="provinces_id" 
                            class="form-control" 
                            v-if="provinces" 
                            v-model="provinces_id"
                          >
                            <option 
                              v-for="province in provinces" 
                              :value="province.id"
                            >
                              @{{ province.name }}
                            </option>
                          </select>
                          <select v-else class="form-control" ></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="regencies_id">Kota</label>
                          <select 
                            name="regencies_id" 
                            id="regencies_id" 
                            class="form-control" 
                            v-if="provinces" 
                            v-model="regencies_id"
                          >
                            <option 
                              v-for="regency in regencies" 
                              :value="regency.id"
                            >
                              @{{ regency.name }}
                            </option>
                          </select>
                          <select v-else class="form-control" ></select>
  
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="zip_code">Kode Pos</label>
                          <input
                            type="number"
                            id="zip_code"
                            name="zip_code"
                            class="form-control"
                            value="{{ $user->zip_code }}"
                          />
                        </div>
                      </div>
  
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="country">Negara</label>
                          <input
                            type="text"
                            name="country"
                            id="country"
                            class="form-control"
                            value="{{ $user->country }}"
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
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script src="/vendor/vue/vue-toasted.min.js"></script>
  <script src="/vendor/axios/axios.min.js"></script>
  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    function showPanel(helpId){
      var changeName = document.getElementById('helpId')

    }
    function showName(){
      var name = document.getElementById('file'); 
      alert('Selected file: ' + name.files.item(0).name);
    }
  </script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        AOS.init();
        this.getProvincesData();
      },
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null,

      },
      methods: {
        getProvincesData() {
          var self = this;
          axios.get('{{ route('api-provinces') }}')
          .then(function(response){
            self.provinces = response.data;
          })
        },
        getRegenciesData() {
          var self = this;
          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function(response){
            self.regencies = response.data;
          })
        }
      },

      watch: {
        provinces_id: function(val, oldVal){
          this.regencies_id = null;
          this.getRegenciesData();
        }
      }
    });
  </script>
@endpush