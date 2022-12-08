<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksis')->select('transaksis.id',
        'transaksis.tanggal',
        'transaksis.jumlah',
        'barangs.nama_barang')
        ->join('barangs', 'barangs.id', '=', 'transaksis.id_barang')
        ->orderBy('transaksis.id', 'desc')
        ->get();      
        return view('dashboard.transaksi.index', [
            'transaksi' =>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.transaksi.create', [
            'barang' =>Barang::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ]);

        Transaksi::create($validatedData);

        return redirect('/dashboard/transaksi')->with('success', 'Transaksi berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('transaksis')->select('transaksis.id',
        'transaksis.tanggal',
        'transaksis.jumlah',
        'transaksis.id_barang'
        )
        ->where('transaksis.id', $id)
        ->orderBy('transaksis.id', 'desc')
        ->first();        
        return view('dashboard.transaksi.edit', [
            'transaksi' => $data,
            'barang' => Barang::all()
           
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'id_barang' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required'
        ];   

        $validatedData = $request->validate($rules);

        Transaksi::where('id', $id)
        ->update($validatedData);
        return redirect('/dashboard/transaksi')->with('success', 'Transaksi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect('/dashboard/transaksi')->with('success', 'Transaksi berhasil dihapus');
    }
}
