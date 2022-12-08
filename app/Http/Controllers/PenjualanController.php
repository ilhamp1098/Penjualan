<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;
use DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = DB::table('barangs')->select(
            'barangs.id',
            'barangs.nama_barang',
            'barangs.stok',
            'barangs.jenis_barang',
        DB::raw('SUM(transaksis.jumlah) as jumlahnya')
        )
        ->join('transaksis', 'barangs.id', '=', 'transaksis.id_barang')
        ->GroupBy('barangs.jenis_barang')
        ->get();      
        return view('dashboard.penjualan.index', [
            'penjualan' =>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('barangs')->select(
            'barangs.id',
            'barangs.nama_barang',
            'barangs.stok',
            'barangs.jenis_barang',
            'transaksis.jumlah',
            'transaksis.tanggal',
            
        )
        ->join('transaksis', 'barangs.id', '=', 'transaksis.id_barang')
        ->where('barangs.jenis_barang', $id)
        ->orderBy('transaksis.tanggal', 'desc')
        ->get();        
        return view('dashboard.penjualan.show', [
            'penjualan' => $data,
            'jenis_barang' =>$id
           
        ]);
    }

    public function filter(Request $request)
    {

        $awal = $request->awal;
        $akhir = $request->akhir;
        $jenis_barang = $request->jenis_barang;

        $data = DB::table('barangs')->select(
            'barangs.id',
            'barangs.nama_barang',
            'barangs.stok',
            'barangs.jenis_barang',
            'transaksis.jumlah',
            'transaksis.tanggal',
            
        )
        ->join('transaksis', 'barangs.id', '=', 'transaksis.id_barang')
        ->where('barangs.jenis_barang', $jenis_barang)
        ->whereBetween('transaksis.tanggal', [$awal, $akhir])
        ->orderBy('transaksis.tanggal', 'desc')
        ->get();        
        return view('dashboard.penjualan.filter', [
            'penjualan' => $data,
            'jenis_barang' =>$jenis_barang
        ]);
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
