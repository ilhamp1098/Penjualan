@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penjualan</h1>

</div>

<div class="row">
<div class="table-responsive col-lg-6">

        <table class="table table-striped table-sm" id="tb_penjualan">
          <thead>
            <tr>
              <th scope="col">#</th>
              
              <th scope="col">Jenis Barang</th>
              <th scope="col">Jumlah Terjual</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penjualan as $c)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$c->jenis_barang}}</td>
              <td>{{$c->jumlahnya}}</td>
              <td>
              <a href="/dashboard/penjualan/{{$c->jenis_barang}}" class="badge bg-info"><span data-feather="eye"></span></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
</div>
</div>


		
@endsection
