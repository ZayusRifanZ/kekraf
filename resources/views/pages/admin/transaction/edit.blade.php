@extends('layouts.admin')

@section('title')
    Kekraf - Transaction Admin - edit
@endsection

@section('content')

<div class="main-content" data-aos="fade-up">
    <section class="section container-fluid">
      <div class="section-header">
        <h1>Transaksi</h1>
        <p>Edit Data Transaksi - {{ $item->name }} 
        </p>
      </div>

      <div class="section-body">
        <div class="dashboard-content">
          <div class="row">
            <div class="col-md-12">
              
              <div class="card">
                <div class="card-body">
                 <form 
                  action="{{ route('transaction.update', $item->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  >
                  @method('PUT')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Status Transaksi</label>
                        <select name="transactions_status" class="form-control">
                          <option value="{{ $item->transactions_status }}" selected>{{ $item->transactions_status }}</option>
                          <option value="" disabled>-----------</option>
                          <option value="PENDING">PENDING</option>
                          <option value="SHIPPING">SHIPPING</option>
                          <option value="SUCCESS">SUCCESS</option>
                          
                        </select>
                        @error('transaction_statuss')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Total Harga</label>
                        <input type="number" name="total_price" class="form-control" value="{{ $item->total_price }}" >
                        @error('total_price')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
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

