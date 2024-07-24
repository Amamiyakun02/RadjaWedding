<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Panggil seeder lainnya di sinigit
        $this->call([
            UserSeeder::class,
            BarangSeeder::class,
            LayananSeeder::class,
//            BundleSeeder::class,
//            BundleBarangSeeder::class,
//            BundleLayananSeeder::class,
//            PenyewaanSeeder::class,
//            DetailPenyewaanSeeder::class,
//            BookingSeeder::class,
//            DetailBookingSeeder::class,
//            PengembalianBarangSeeder::class,
//            PembayaranSeeder::class,
        ]);
    }
}
