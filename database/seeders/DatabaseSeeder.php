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
        // Panggil seeder lainnya di sini
        $this->call([
//            UserSeeder::class, -> done
//            BarangSeeder::class, -> done
//            LayananSeeder::class, -> done
//            BundleSeeder::class, -> done
//            BundleBarangSeeder::class, -> done
//            BundleLayananSeeder::class, -> done
//            PenyewaanSeeder::class, -> done
//            DetailPenyewaanSeeder::class, -> done
//            BookingSeeder::class, -> done
//            DetailBookingSeeder::class, -> done
            PengembalianBarangSeeder::class,
//            PembayaranSeeder::class, ->done

        ]);
    }
}
