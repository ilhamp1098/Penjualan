@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penjualan</h1>

</div>
<form method="post" action="/dashboard/penjualan/filter" class="mb-5" enctype="multipart/form-data">
@csrf
<div class="col-md-6">
    <p>Filter</p>    
    <div class="mb-3">
        <label for="awal" class="form-label">Dari Tanggal</label>
        <input type="date" class="form-control @error('awal') is-invalid @enderror" name="awal" id="awal"  required autofocus value="{{old('awal')}}">
    </div>
    <div class="mb-3">
        <label for="akhir" class="form-label">Sampai Tanggal</label>
        <input type="date" class="form-control @error('akhir') is-invalid @enderror" name="akhir" id="akhir"  required autofocus value="{{old('akhir')}}">
    </div>
    <input type="hidden" value="{{$jenis_barang}}" name="jenis_barang" id="jenis_barang">  
    <button type="submit" class="btn btn-primary">Filter</button>
    <a href="/dashboard/penjualan/{{$jenis_barang}}" class="btn btn-info">Semua</a>
</div>  
</form>
<div class="row">
<div class="table-responsive col-lg-6">

        <table class="table table-striped table-sm" id="tb_penjualan">
          <thead>
            <tr>
              <th scope="col">#</th>
              
              <th scope="col">Jenis Barang</th>
              <th scope="col">Jumlah Terjual</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Jenis Barang</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penjualan as $c)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$c->nama_barang}}</td>
              <td>{{$c->jumlah}}</td>
              <td>{{$c->tanggal}}</td>
              <td>{{$c->jenis_barang}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
</div>
</div>


		
@endsection
