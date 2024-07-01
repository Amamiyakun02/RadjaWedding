<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $data = [
            [
                'UserID' => 1,
                'tanggal_pemesanan' => '2024-07-01',
                'tanggal_layanan' => '2024-07-10',
                'total_harga' => 500000.00,
                'status' => 'pending',
                'BundleID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 2,
                'tanggal_pemesanan' => '2024-07-02',
                'tanggal_layanan' => '2024-07-11',
                'total_harga' => 750000.00,
                'status' => 'selesai',
                'BundleID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 1,
                'tanggal_pemesanan' => '2024-07-03',
                'tanggal_layanan' => '2024-07-12',
                'total_harga' => 1000000.00,
                'status' => 'pending',
                'BundleID' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 4,
                'tanggal_pemesanan' => '2024-07-04',
                'tanggal_layanan' => '2024-07-13',
                'total_harga' => 300000.00,
                'status' => 'selesai',
                'BundleID' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 5,
                'tanggal_pemesanan' => '2024-07-05',
                'tanggal_layanan' => '2024-07-14',
                'total_harga' => 600000.00,
                'status' => 'pending',
                'BundleID' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 6,
                'tanggal_pemesanan' => '2024-07-06',
                'tanggal_layanan' => '2024-07-15',
                'total_harga' => 900000.00,
                'status' => 'selesai',
                'BundleID' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 7,
                'tanggal_pemesanan' => '2024-07-07',
                'tanggal_layanan' => '2024-07-16',
                'total_harga' => 400000.00,
                'status' => 'pending',
                'BundleID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 8,
                'tanggal_pemesanan' => '2024-07-08',
                'tanggal_layanan' => '2024-07-17',
                'total_harga' => 500000.00,
                'status' => 'selesai',
                'BundleID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 9,
                'tanggal_pemesanan' => '2024-07-09',
                'tanggal_layanan' => '2024-07-18',
                'total_harga' => 200000.00,
                'status' => 'pending',
                'BundleID' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 10,
                'tanggal_pemesanan' => '2024-07-10',
                'tanggal_layanan' => '2024-07-19',
                'total_harga' => 1000000.00,
                'status' => 'selesai',
                'BundleID' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 10,
                'tanggal_pemesanan' => '2024-07-11',
                'tanggal_layanan' => '2024-07-20',
                'total_harga' => 300000.00,
                'status' => 'pending',
                'BundleID' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 5,
                'tanggal_pemesanan' => '2024-07-12',
                'tanggal_layanan' => '2024-07-21',
                'total_harga' => 600000.00,
                'status' => 'selesai',
                'BundleID' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 7,
                'tanggal_pemesanan' => '2024-07-13',
                'tanggal_layanan' => '2024-07-22',
                'total_harga' => 400000.00,
                'status' => 'pending',
                'BundleID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 4,
                'tanggal_pemesanan' => '2024-07-14',
                'tanggal_layanan' => '2024-07-23',
                'total_harga' => 500000.00,
                'status' => 'selesai',
                'BundleID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserID' => 8,
                'tanggal_pemesanan' => '2024-07-15',
                'tanggal_layanan' => '2024-07-24',
                'total_harga' => 200000.00,
                'status' => 'pending',
                'BundleID' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bookings')->insert($data);
    }
}
