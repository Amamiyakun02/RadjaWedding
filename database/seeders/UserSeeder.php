<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [];

        for ($i = 1; $i <= 50; $i++) {
            $users[] = [
                'username' => 'user' . $i,
                'nama' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'telepon' => '081234567' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'alamat' => 'Jl. Contoh No.' . $i . ', Kota Contoh',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => $i % 2 == 0 ? 'L' : 'P',
                'tanggal_lahir' => '1990-01-01',
                'password' => Hash::make('password123'),
            ];
        }

        DB::table('users')->insert($users);
    }
}
