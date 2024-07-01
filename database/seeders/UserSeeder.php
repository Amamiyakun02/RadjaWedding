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
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin1',
                'nama' => 'Andi Santoso',
                'email' => 'andi.santoso@example.com',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Kebon Kacang No.1, Jakarta',
                'jenis_pengguna' => 'admin',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1990-01-01',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'admin2',
                'nama' => 'Budi Prasetyo',
                'email' => 'budi.prasetyo@example.com',
                'telepon' => '082345678901',
                'alamat' => 'Jl. Sudirman No.2, Jakarta',
                'jenis_pengguna' => 'admin',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1992-02-02',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan1',
                'nama' => 'Siti Aminah',
                'email' => 'siti.aminah@example.com',
                'telepon' => '083456789012',
                'alamat' => 'Jl. Thamrin No.3, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1988-03-03',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan2',
                'nama' => 'Joko Widodo',
                'email' => 'joko.widodo@example.com',
                'telepon' => '084567890123',
                'alamat' => 'Jl. Gatot Subroto No.4, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1985-04-04',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan3',
                'nama' => 'Rina Dewi',
                'email' => 'rina.dewi@example.com',
                'telepon' => '085678901234',
                'alamat' => 'Jl. Rasuna Said No.5, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1995-05-05',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan4',
                'nama' => 'Yanto Suprapto',
                'email' => 'yanto.suprapto@example.com',
                'telepon' => '086789012345',
                'alamat' => 'Jl. M.H. Thamrin No.6, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1993-06-06',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan5',
                'nama' => 'Wulan Sari',
                'email' => 'wulan.sari@example.com',
                'telepon' => '087890123456',
                'alamat' => 'Jl. Diponegoro No.7, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1991-07-07',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan6',
                'nama' => 'Hadi Subagio',
                'email' => 'hadi.subagio@example.com',
                'telepon' => '088901234567',
                'alamat' => 'Jl. Jendral Sudirman No.8, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1994-08-08',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan7',
                'nama' => 'Dewi Lestari',
                'email' => 'dewi.lestari@example.com',
                'telepon' => '089012345678',
                'alamat' => 'Jl. Senayan No.9, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1987-09-09',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan8',
                'nama' => 'Agus Setiawan',
                'email' => 'agus.setiawan@example.com',
                'telepon' => '090123456789',
                'alamat' => 'Jl. Kebon Sirih No.10, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1996-10-10',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan9',
                'nama' => 'Lina Yuliana',
                'email' => 'lina.yuliana@example.com',
                'telepon' => '091234567890',
                'alamat' => 'Jl. Kuningan No.11, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1998-11-11',
                'password' => Hash::make('password123'),
            ],
            [
                'username' => 'pelanggan10',
                'nama' => 'Rudi Setiawan',
                'email' => 'rudi.setiawan@example.com',
                'telepon' => '092345678901',
                'alamat' => 'Jl. Pejompongan No.12, Jakarta',
                'jenis_pengguna' => 'pelanggan',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1997-12-12',
                'password' => Hash::make('password123'),
            ],
        ]);

    }
}
