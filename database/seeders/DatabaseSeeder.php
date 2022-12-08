<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Barang;
use App\Models\Transaksi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Barang::create([
            'nama_barang' => 'Kopi',
            'stok' => 100,
            'jenis_barang' => 'Konsumsi'
        ]);  
        Barang::create([
            'nama_barang' => 'Teh',
            'stok' => 100,
            'jenis_barang' => 'Konsumsi'
        ]);
        Barang::create([
            'nama_barang' => 'Pasta Gigi',
            'stok' => 100,
            'jenis_barang' => 'Pembersih'
        ]);  
        
        Transaksi::create([
            'id_barang' => 1,
            'jumlah' => 10,
            'tanggal' => '2022-12-07'
        ]);          
    }
}
