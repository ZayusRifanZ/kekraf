@extends('layouts.admin')

@section('title')
    Kekraf - Transaction Admin
@endsection

@section('content')
  <div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Transaksi</h1>
        <p>Daftar Transaksi</p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
              @endif
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Status</th>
                          <th>Dibuat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead> 
                      <tbody>
                        
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
        { data: 'user.name', name:'user.name'},
        { data: 'total_price', name:'total_price'},
        { data: 'transactions_status', name:'transactions_status'},
        { data: 'created_at', name:'created_at'},
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