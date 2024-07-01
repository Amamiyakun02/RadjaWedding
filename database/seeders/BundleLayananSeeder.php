<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BundleLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Bundle 1: Bundle Pernikahan Mewah
            ['BundleID' => 1, 'layananID' => 1], // Tata Rias & Make Up
            ['BundleID' => 1, 'layananID' => 2], // Penyewaan Dekorasi Pernikahan
            ['BundleID' => 1, 'layananID' => 3], // Penyewaan Gaun Pernikahan

            // Bundle 2: Bundle Pernikahan Sederhana
            ['BundleID' => 2, 'layananID' => 1], // Tata Rias & Make Up
            ['BundleID' => 2, 'layananID' => 2], // Penyewaan Dekorasi Pernikahan

            // Bundle 3: Bundle Tata Rias dan Make Up
            ['BundleID' => 3, 'layananID' => 1], // Tata Rias & Make Up

            // Bundle 4: Bundle Penyewaan Dekorasi
            ['BundleID' => 4, 'layananID' => 2], // Penyewaan Dekorasi Pernikahan

            // Bundle 5: Bundle Penyewaan Gaun
            ['BundleID' => 5, 'layananID' => 3], // Penyewaan Gaun Pernikahan

            // Bundle 6: Bundle Hair Rebonding dan Potong Rambut
            ['BundleID' => 6, 'layananID' => 4], // Hair Rebonding
            ['BundleID' => 6, 'layananID' => 5], // Potong Rambut
        ];

        DB::table('bundle_layanan')->insert($data);
    }
}
