<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengembalianBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
        $data = [
            [
                'penyewaanID' => 1,
                'barangID' => 1,
                'tanggal_pengembalian' => '2024-07-20',
                'kondisi' => 'baik',
                'catatan' => 'Tidak ada kerusakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 2,
                'barangID' => 2,
                'tanggal_pengembalian' => '2024-07-21',
                'kondisi' => 'rusak',
                'catatan' => 'Sedikit lecet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 3,
                'barangID' => 3,
                'tanggal_pengembalian' => '2024-07-22',
                'kondisi' => 'hilang',
                'catatan' => 'Barang hilang saat pengiriman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 4,
                'barangID' => 4,
                'tanggal_pengembalian' => '2024-07-23',
                'kondisi' => 'baik',
                'catatan' => 'Tidak ada kerusakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 5,
                'barangID' => 5,
                'tanggal_pengembalian' => '2024-07-24',
                'kondisi' => 'rusak',
                'catatan' => 'Sedikit robek',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 6,
                'barangID' => 6,
                'tanggal_pengembalian' => '2024-07-25',
                'kondisi' => 'baik',
                'catatan' => 'Tidak ada kerusakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 7,
                'barangID' => 7,
                'tanggal_pengembalian' => '2024-07-26',
                'kondisi' => 'hilang',
                'catatan' => 'Tidak ditemukan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 8,
                'barangID' => 8,
                'tanggal_pengembalian' => '2024-07-27',
                'kondisi' => 'baik',
                'catatan' => 'Tidak ada kerusakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 9,
                'barangID' => 9,
                'tanggal_pengembalian' => '2024-07-28',
                'kondisi' => 'rusak',
                'catatan' => 'Kerusakan kecil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyewaanID' => 10,
                'barangID' => 10,
                'tanggal_pengembalian' => '2024-07-29',
                'kondisi' => 'baik',
                'catatan' => 'Tidak ada kerusakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pengembalian_barang')->insert($data);
    }
}
