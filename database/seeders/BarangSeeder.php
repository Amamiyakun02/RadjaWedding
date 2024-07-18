<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    public function run()
    {
        $barang = [];
        for ($i = 0; $i <= 50; $i++)
        {
            $barang[] = [
                'nama' => 'Barang ' . $i,
                'deskripsi' => 'Deskripsi Barang ' . $i,
                'harga' => 400000.00,
                'stok' => 9,
                'kategori' => 'dekorasi',
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Buket+Bunga+Pengantin'
            ];
        }
        DB::table('barang')->insert($barang);
    }

}
