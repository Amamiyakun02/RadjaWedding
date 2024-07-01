<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // Booking 1
            [
                'BookingID' => 1,
                'layananID' => 1, // Tata Rias & Make Up
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 1,
                'layananID' => 2, // Penyewaan dekorasi Pernikahan
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 2
            [
                'BookingID' => 2,
                'layananID' => 3, // Penyewaan Gaun Pernikahan
                'harga' => 500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 2,
                'layananID' => 4, // Hair Rebonding
                'harga' => 250000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 3
            [
                'BookingID' => 3,
                'layananID' => 1, // Tata Rias & Make Up
                'harga' => 500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 3,
                'layananID' => 3, // Penyewaan Gaun Pernikahan
                'harga' => 500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 4
            [
                'BookingID' => 4,
                'layananID' => 2, // Penyewaan dekorasi Pernikahan
                'harga' => 150000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 4,
                'layananID' => 5, // Potong Rambut
                'harga' => 150000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 5
            [
                'BookingID' => 5,
                'layananID' => 1, // Tata Rias & Make Up
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 5,
                'layananID' => 4, // Hair Rebonding
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 6
            [
                'BookingID' => 6,
                'layananID' => 3, // Penyewaan Gaun Pernikahan
                'harga' => 600000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 6,
                'layananID' => 2, // Penyewaan dekorasi Pernikahan
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 7
            [
                'BookingID' => 7,
                'layananID' => 5, // Potong Rambut
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 7,
                'layananID' => 1, // Tata Rias & Make Up
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 8
            [
                'BookingID' => 8,
                'layananID' => 4, // Hair Rebonding
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 9,
                'layananID' => 4, // Hair Rebonding
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Booking 6
            [
                'BookingID' => 10,
                'layananID' => 3, // Penyewaan Gaun Pernikahan
                'harga' => 600000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 11,
                'layananID' => 2, // Penyewaan dekorasi Pernikahan
                'harga' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'BookingID' => 12,
                'layananID' => 5, // Potong Rambut
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 13,
                'layananID' => 1, // Tata Rias & Make Up
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'BookingID' => 14,
                'layananID' => 4, // Hair Rebonding
                'harga' => 200000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'BookingID' => 15,
                'layananID' => 3, // Penyewaan Gaun Pernikahan
                'harga' => 600000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('detail_booking')->insert($data);

    }
}
