<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang.index', [
            'barang' =>Barang::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.create');
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
            'nama_barang' => 'required|max:30',
            'stok' => 'required',
            'jenis_barang' => 'required'
        ]);

        Barang::create($validatedData);

        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('barangs')
        ->where('barangs.id', $id)
        ->first();        
        return view('dashboard.barang.edit', [
            'barang' => $data
           
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $rules = [
            'nama_barang' => 'required|max:30',
            'stok' => 'required',
            'jenis_barang' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Barang::where('id', $id)
        ->update($validatedData);
        return redirect('/dashboard/barang')->with('success', 'Barang berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('/dashboard/barang')->with('success', 'Barang berhasil dihapus');
    }
}
