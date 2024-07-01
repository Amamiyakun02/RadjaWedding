<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            // Penyewaan 1
            ['RentalID' => 1, 'barangID' => 1, 'Quantity' => 2, 'harga' => 100000.00],
            ['RentalID' => 1, 'barangID' => 2, 'Quantity' => 1, 'harga' => 50000.00],

            // Penyewaan 2
            ['RentalID' => 2, 'barangID' => 3, 'Quantity' => 3, 'harga' => 150000.00],
            ['RentalID' => 2, 'barangID' => 4, 'Quantity' => 1, 'harga' => 75000.00],

            // Penyewaan 3
            ['RentalID' => 3, 'barangID' => 5, 'Quantity' => 1, 'harga' => 200000.00],
            ['RentalID' => 3, 'barangID' => 6, 'Quantity' => 2, 'harga' => 100000.00],

            // Penyewaan 4
            ['RentalID' => 4, 'barangID' => 7, 'Quantity' => 2, 'harga' => 50000.00],
            ['RentalID' => 4, 'barangID' => 8, 'Quantity' => 1, 'harga' => 100000.00],

            // Penyewaan 5
            ['RentalID' => 5, 'barangID' => 9, 'Quantity' => 1, 'harga' => 50000.00],
            ['RentalID' => 5, 'barangID' => 10, 'Quantity' => 2, 'harga' => 150000.00],
        ];

        DB::table('detail_penyewaan')->insert($data);
    }
}
