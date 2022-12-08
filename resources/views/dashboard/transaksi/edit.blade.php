@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit barang</h1>

</div>

<form method="post" action="/dashboard/transaksi/{{$transaksi->id}}" class="mb-5" enctype="multipart/form-data">
    @csrf
<div class="col-md-6">
  <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal Transaksi</label>
    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal"  required autofocus value="{{old('tanggal', $transaksi->tanggal)}}">
    @error('tanggal')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="id_barang" class="form-label">Nama Barang</label>    
    <select class="form-select" name="id_barang">
        @foreach ($barang as $w)
          @if(old('id_barang', $transaksi->id_barang) == $w->id)
        <option value="{{$w->id}}" selected>{{$w->nama_barang}}</option>
          @else
        <option value="{{$w->id}}">{{$w->nama_barang}}</option>
          @endif
        @endforeach
    </select> 
  </div>  
 
  <div class="mb-3">
    <label for="jumlah" class="form-label">Jumlah barang</label>
    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah"  required autofocus value="{{old('jumlah', $transaksi->jumlah)}}">
    @error('jumlah')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>  

    <button type="submit" class="btn btn-primary">Edit</button>
</div>
</form>
@endsection