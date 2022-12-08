@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat barang</h1>

</div>

<form method="post" action="/dashboard/barang" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
  <div class="mb-3">
    <label for="nama_barang" class="form-label">Nama barang</label>
    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nama_barang"  required autofocus value="{{old('nama_barang')}}">
    @error('nama_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
 
  <div class="mb-3">
    <label for="stok" class="form-label">Stok barang</label>
    <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok"  required autofocus value="{{old('stok')}}">
    @error('stok')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>  
  <div class="mb-3">
  <label for="jenis_barang" class="form-label">Jenis Barang</label>    
    <select class="form-select" name="jenis_barang">
        <option>Konsumsi</option>
        <option>Pembersih</option>
    </select> 
  </div>
    <button type="submit" class="btn btn-primary">Buat</button>
</div>
</form>
@endsection