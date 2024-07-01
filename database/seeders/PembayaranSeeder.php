<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            [
                'rentalID' => 1,
                'detailbookingID' => 1,
                'tanggal_pembayaran' => '2024-07-01',
                'jumlah' => 500000.00,
                'metode_pembayaran' => 'tunai',
                'status' => 'dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rentalID' => 2,
                'detailbookingID' => 2,
                'tanggal_pembayaran' => '2024-07-02',
                'jumlah' => 750000.00,
                'metode_pembayaran' => 'kartu_kredit',
                'status' => 'belum_dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rentalID' => 3,
                'detailbookingID' => 3,
                'tanggal_pembayaran' => '2024-07-03',
                'jumlah' => 300000.00,
                'metode_pembayaran' => 'transfer_bank',
                'status' => 'dibayar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data jika diperlukan
        ];
        DB::table('pembayaran')->insert($data);
    }
}
