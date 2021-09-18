@extends('layouts.admin')

@section('title')
    Kekraf - User Admin
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Pengguna</h1>
        <p>Daftar Pengguna</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                    + Tambah Pengguna Baru 
                  </a>
                  <div class="table-responsive">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Aksi</th>
                        </tr>
                      </thead> 
                      <tbody>
                        <tr>
                          <td>1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </section>
  </div>
@endsection

@push('addon-script')
  <script>
    var i =1;
    var datatable = $('#crudTable').DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      ajax: {
        url: '{!! url()->current() !!}',
      },
      columns: [
        { data: 'id', sortable:false, 
          render: function (data, type, row, meta) {
           return meta.row + meta.settings._iDisplayStart + 1;
          } 
        },
        { data: 'name', name:'name'},
        { data: 'email', name:'email'},
        { data: 'roles', name:'roles'},
        { 
          data: 'action', 
          name:'action',
          orderable: false,
          searcable: false,
          width: '15%'
        },
      ]
    })
  </script>
@endpush