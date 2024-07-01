<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tata Rias & Make Up',
                'deskripsi' => 'Layanan tata rias dan make up profesional untuk acara pernikahan Anda.',
                'harga' => 1500000.00,
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Tata+Rias+%26+Make+Up',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penyewaan Dekorasi Pernikahan',
                'deskripsi' => 'Sewa dekorasi pernikahan lengkap dengan berbagai tema dan pilihan.',
                'harga' => 2500000.00,
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Penyewaan+Dekorasi+Pernikahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penyewaan Gaun Pernikahan',
                'deskripsi' => 'Sewa gaun pengantin dengan berbagai desain dan ukuran.',
                'harga' => 2000000.00,
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Penyewaan+Gaun+Pernikahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hair Rebonding',
                'deskripsi' => 'Layanan hair rebonding untuk mendapatkan rambut lurus dan halus.',
                'harga' => 1000000.00,
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Hair+Rebonding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Potong Rambut',
                'deskripsi' => 'Layanan potong rambut untuk pria dan wanita dengan berbagai gaya.',
                'harga' => 150000.00,
                'url_gambar' => 'https://via.placeholder.com/640x480?text=Potong+Rambut',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('layanan')->insert($data);
    }
}
