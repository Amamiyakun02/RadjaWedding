<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BundleBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // Bundle 1: Bundle Pernikahan Mewah
            ['bundle_id' => 1, 'barang_id' => 1, 'Quantity' => 1],
            ['bundle_id' => 1, 'barang_id' => 6, 'Quantity' => 1],
            ['bundle_id' => 1, 'barang_id' => 11, 'Quantity' => 1],
            ['bundle_id' => 1, 'barang_id' => 16, 'Quantity' => 1],
            ['bundle_id' => 1, 'barang_id' => 21, 'Quantity' => 1],

            // Bundle 2: Bundle Pernikahan Sederhana
            ['bundle_id' => 2, 'barang_id' => 2, 'Quantity' => 1],
            ['bundle_id' => 2, 'barang_id' => 7, 'Quantity' => 1],
            ['bundle_id' => 2, 'barang_id' => 12, 'Quantity' => 1],
            ['bundle_id' => 2, 'barang_id' => 17, 'Quantity' => 1],
            ['bundle_id' => 2, 'barang_id' => 22, 'Quantity' => 1],

            // Bundle 3: Bundle Tata Rias dan Make Up
            ['bundle_id' => 3, 'barang_id' => 3, 'Quantity' => 1],
            ['bundle_id' => 3, 'barang_id' => 8, 'Quantity' => 1],
            ['bundle_id' => 3, 'barang_id' => 13, 'Quantity' => 1],
            ['bundle_id' => 3, 'barang_id' => 18, 'Quantity' => 1],
            ['bundle_id' => 3, 'barang_id' => 23, 'Quantity' => 1],

            // Bundle 4: Bundle Penyewaan Dekorasi
            ['bundle_id' => 4, 'barang_id' => 4, 'Quantity' => 1],
            ['bundle_id' => 4, 'barang_id' => 9, 'Quantity' => 1],
            ['bundle_id' => 4, 'barang_id' => 14, 'Quantity' => 1],
            ['bundle_id' => 4, 'barang_id' => 19, 'Quantity' => 1],
            ['bundle_id' => 4, 'barang_id' => 24, 'Quantity' => 1],

            // Bundle 5: Bundle Penyewaan Gaun
            ['bundle_id' => 5, 'barang_id' => 5, 'Quantity' => 1],
            ['bundle_id' => 5, 'barang_id' => 10, 'Quantity' => 1],
            ['bundle_id' => 5, 'barang_id' => 15, 'Quantity' => 1],
            ['bundle_id' => 5, 'barang_id' => 20, 'Quantity' => 1],
            ['bundle_id' => 5, 'barang_id' => 25, 'Quantity' => 1],

            // Bundle 6: Bundle Hair Rebonding dan Potong Rambut
            ['bundle_id' => 6, 'barang_id' => 26, 'Quantity' => 1],
            ['bundle_id' => 6, 'barang_id' => 27, 'Quantity' => 1],
            ['bundle_id' => 6, 'barang_id' => 28, 'Quantity' => 1],
            ['bundle_id' => 6, 'barang_id' => 29, 'Quantity' => 1],
            ['bundle_id' => 6, 'barang_id' => 30, 'Quantity' => 1],
        ];

        DB::table('bundle_barang')->insert($data);
    }
}
