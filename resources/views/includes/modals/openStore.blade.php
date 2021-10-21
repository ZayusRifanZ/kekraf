{{-- modal for payment --}}

<div
  class="modal fade"
  id="openStore"
  tabindex="-1"
  aria-labelledby="openStoreLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="openStoreLabel">
          Buka Toko
        </h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form 
        action="{{ route('dashboard-user-openStore') }}" 
        method="POST" 
        id="app"
        @submit="checkForm">
        @csrf
        <div class="modal-body">

          <p v-if="errors.length">
            {{-- <b>Please correct the following error(s):</b> --}}
            <ul>
              <li v-for="error in errors" class="text-danger">@{{ error }}</li>
            </ul>
          </p>
        
          <div class="form-group">
            <label for="store_name">Nama Toko</label>
            <input 
              type="text" 
              name="store_name" 
              id="store_name"
              v-model="store_name"
              placeholder="Masukkan nama toko" 
              class="form-control"
              min="3">
            @error('store_name')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="category">Kategori Toko</label>
            @php
              $categories = \App\Category::all()
            @endphp
            <template>
              <select 
                name="categories_id" 
                id="category" 
                v-model="categories_id" 
                class="form-control"
                {{-- v-model="selected" --}}
              >
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </template>
            @error('categories_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-light"
            data-dismiss="modal"
          >
            Close
          </button>
          <button type="submit" class="btn btn-primary">
            Open
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script>
    const app = new Vue({
      el: '#app',
      mounted() {
        AOS.init();
      },
      data: {
        errors: [],
        store_name: null,
        categories_id: null,
      },
      methods:{
        checkForm: function (e) {
          if (this.store_name && this.categories_id) {
            return true;
          }

          this.errors = [];

          if (!this.store_name) {
            this.errors.push('Name toko tidak boleh kosong.');
          }
          if (!this.categories_id) {
            this.errors.push('kategori harus diisi');
          }

          e.preventDefault();
        }
      }
    })
  </script>
@endpush