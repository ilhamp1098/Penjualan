@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi</h1>

</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{session('success')}}
  </div>
@endif

<div class="row">
<div class="table-responsive col-lg-6">

<a href="/dashboard/transaksi/create" class="btn btn-primary mb-3">Buat Transaksi</a>
        <table class="table table-striped table-sm" id="tb_transaksi">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksi as $c)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$c->tanggal}}</td>
              <td>{{$c->nama_barang}}</td>
              <td>{{$c->jumlah}}</td>
              <td>
                <a href="/dashboard/transaksi/{{$c->id}}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
                <form action="/dashboard/transaksi-delete/{{$c->id}}" method="post" class="d-inline">
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
</div>
</div>


		
@endsection
