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
$faker = Faker::create();
        $pelangganIds = DB::table('users')->where('jenis_pengguna', 'pelanggan')->pluck('id');
        $selectedIds = $pelangganIds->shuffle();  // Acak ID pelanggan

        // Ambil 12 pelanggan dengan 1 pembayaran
        $singlePaymentIds = $selectedIds->splice(0, 12);
        foreach ($singlePaymentIds as $userId) {
            DB::table('pembayaran')->insert([
                'UserID' => $userId,
                'tanggal_pembayaran' => $faker->date(),
                'jumlah' => $faker->randomFloat(2, 1000, 10000),  // Jumlah pembayaran antara 1000 dan 10000
                'metode_pembayaran' => $faker->randomElement(['tunai', 'kartu_kredit', 'transfer_bank']),
                'status' => $faker->randomElement(['dibayar', 'belum_dibayar']),
            ]);
        }
    }
}
