<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Bundle Pernikahan Mewah',
                'deskripsi' => 'Paket lengkap untuk pernikahan mewah termasuk dekorasi, gaun, dan tata rias.',
                'total_harga' => 15000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bundle Pernikahan Sederhana',
                'deskripsi' => 'Paket sederhana yang mencakup dekorasi minimalis dan gaun pengantin.',
                'total_harga' => 8000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bundle Tata Rias dan Make Up',
                'deskripsi' => 'Paket tata rias dan make up lengkap untuk pengantin dan keluarga.',
                'total_harga' => 3000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bundle Penyewaan Dekorasi',
                'deskripsi' => 'Paket sewa dekorasi untuk berbagai tema pernikahan.',
                'total_harga' => 5000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bundle Penyewaan Gaun',
                'deskripsi' => 'Paket sewa gaun pengantin dan gaun bridesmaid.',
                'total_harga' => 4000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bundle Hair Rebonding dan Potong Rambut',
                'deskripsi' => 'Paket layanan hair rebonding dan potong rambut untuk pengantin dan keluarga.',
                'total_harga' => 2000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bundle_penyewaan')->insert($data);
    }
}
