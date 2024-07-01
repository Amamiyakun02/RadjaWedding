<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
//    public function run(): void
//    {
//        $faker = Faker::create();
//
//        $categories = ['gaun', 'dekorasi', 'aksesoris', 'pelaminan', 'other'];
//
//        for ($i = 0; $i < 30; $i++) {
//            $kategori = $faker->randomElement($categories);
//            DB::table('barang')->insert([
//                'nama' => $faker->word() . ' ' . $kategori,
//                'deskripsi' => $faker->text(100),
//                'harga' => $faker->randomFloat(2, 100000, 2000000),  // Harga antara 100000 dan 2000000
//                'stok' => $faker->numberBetween(1, 50),  // Stok antara 1 dan 50
//                'kategori' => $kategori,
//                'url_gambar' => $faker->imageUrl(640, 480, 'fashion', true),  // URL gambar dummy
//                'created_at' => now(),
//                'updated_at' => now(),
//            ]);
//        }
//    }

    public function run()
    {
        $data = [
            // Kategori gaun
            ['nama' => 'Gaun Pengantin Elegan', 'deskripsi' => 'Gaun pengantin elegan untuk hari spesial Anda.', 'harga' => 1500000.00, 'stok' => 10, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Pengantin'],
            ['nama' => 'Gaun Pengantin Sederhana', 'deskripsi' => 'Gaun pengantin sederhana dengan desain minimalis.', 'harga' => 800000.00, 'stok' => 12, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Pengantin+Sederhana'],
            ['nama' => 'Gaun Bridesmaid', 'deskripsi' => 'Gaun bridesmaid untuk teman-teman pengantin.', 'harga' => 600000.00, 'stok' => 15, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Bridesmaid'],
            ['nama' => 'Gaun Rehearsal', 'deskripsi' => 'Gaun untuk acara rehearsal sebelum hari H.', 'harga' => 700000.00, 'stok' => 8, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Rehearsal'],
            ['nama' => 'Gaun Pesta', 'deskripsi' => 'Gaun untuk acara pesta pernikahan.', 'harga' => 900000.00, 'stok' => 5, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Pesta'],

            // Kategori dekorasi
            ['nama' => 'Dekorasi Bunga', 'deskripsi' => 'Dekorasi bunga untuk meja resepsi.', 'harga' => 500000.00, 'stok' => 20, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Dekorasi+Bunga'],
            ['nama' => 'Backdrop Pernikahan', 'deskripsi' => 'Backdrop indah untuk foto pernikahan.', 'harga' => 1000000.00, 'stok' => 10, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Backdrop+Pernikahan'],
            ['nama' => 'Dekorasi Meja', 'deskripsi' => 'Dekorasi meja dengan tema pernikahan.', 'harga' => 300000.00, 'stok' => 15, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Dekorasi+Meja'],
            ['nama' => 'Lampu Hias', 'deskripsi' => 'Lampu hias untuk menambah suasana pernikahan.', 'harga' => 400000.00, 'stok' => 25, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Lampu+Hias'],
            ['nama' => 'Dekorasi Tenda', 'deskripsi' => 'Tenda dekoratif untuk acara pernikahan outdoor.', 'harga' => 1500000.00, 'stok' => 4, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Dekorasi+Tenda'],

            // Kategori aksesoris
            ['nama' => 'Mahkota Pengantin', 'deskripsi' => 'Mahkota indah untuk pengantin wanita.', 'harga' => 400000.00, 'stok' => 12, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Mahkota+Pengantin'],
            ['nama' => 'Aksesoris Rambut', 'deskripsi' => 'Aksesoris rambut untuk menambah keindahan.', 'harga' => 250000.00, 'stok' => 20, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Aksesoris+Rambut'],
            ['nama' => 'Sarung Tangan Pengantin', 'deskripsi' => 'Sarung tangan elegan untuk pengantin.', 'harga' => 150000.00, 'stok' => 15, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Sarung+Tangan+Pengantin'],
            ['nama' => 'Sepatu Pengantin', 'deskripsi' => 'Sepatu yang cocok untuk pengantin wanita.', 'harga' => 600000.00, 'stok' => 8, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Sepatu+Pengantin'],
            ['nama' => 'Jepit Rambut Kristal', 'deskripsi' => 'Jepit rambut dengan kristal yang berkilau.', 'harga' => 200000.00, 'stok' => 18, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Jepit+Rambut+Kristal'],

            // Kategori pelaminan
            ['nama' => 'Pelaminan Sederhana', 'deskripsi' => 'Desain pelaminan sederhana namun elegan.', 'harga' => 2000000.00, 'stok' => 3, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Pelaminan+Sederhana'],
            ['nama' => 'Pelaminan Mewah', 'deskripsi' => 'Pelaminan dengan desain mewah dan megah.', 'harga' => 5000000.00, 'stok' => 2, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Pelaminan+Mewah'],
            ['nama' => 'Pelaminan Outdoor', 'deskripsi' => 'Pelaminan untuk acara pernikahan di luar ruangan.', 'harga' => 3500000.00, 'stok' => 4, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Pelaminan+Outdoor'],
            ['nama' => 'Dekorasi Pelaminan', 'deskripsi' => 'Dekorasi tambahan untuk pelaminan.', 'harga' => 1200000.00, 'stok' => 5, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Dekorasi+Pelaminan'],
            ['nama' => 'Sewa Pelaminan', 'deskripsi' => 'Sewa paket pelaminan untuk pernikahan Anda.', 'harga' => 4000000.00, 'stok' => 2, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Sewa+Pelaminan'],

            // Kategori other
            ['nama' => 'Kursi Rias', 'deskripsi' => 'Kursi nyaman untuk proses rias pengantin.', 'harga' => 350000.00, 'stok' => 10, 'kategori' => 'other', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Kursi+Rias'],
            ['nama' => 'Meja Rias', 'deskripsi' => 'Meja rias untuk kebutuhan tata rias pengantin.', 'harga' => 700000.00, 'stok' => 8, 'kategori' => 'other', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Meja+Rias'],
            ['nama' => 'Kamera Fotografi', 'deskripsi' => 'Kamera untuk dokumentasi acara pernikahan.', 'harga' => 2000000.00, 'stok' => 5, 'kategori' => 'other', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Kamera+Fotografi'],
            ['nama' => 'Lampu Fotografi', 'deskripsi' => 'Lampu untuk pencahayaan foto pernikahan.', 'harga' => 600000.00, 'stok' => 7, 'kategori' => 'other', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Lampu+Fotografi'],
            ['nama' => 'Sewa Perlengkapan Rias', 'deskripsi' => 'Paket sewa perlengkapan untuk rias pengantin.', 'harga' => 800000.00, 'stok' => 6, 'kategori' => 'other', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Sewa+Perlengkapan+Rias'],

            // Tambahan untuk mencapai 30 data
            ['nama' => 'Buket Bunga Pengantin', 'deskripsi' => 'Buket bunga cantik untuk pengantin.', 'harga' => 400000.00, 'stok' => 9, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Buket+Bunga+Pengantin'],
            ['nama' => 'Aksesoris Kuku Pengantin', 'deskripsi' => 'Aksesoris kuku untuk menambah keindahan tangan pengantin.', 'harga' => 150000.00, 'stok' => 14, 'kategori' => 'aksesoris', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Aksesoris+Kuku+Pengantin'],
            ['nama' => 'Gaun Maternity Pengantin', 'deskripsi' => 'Gaun pengantin untuk ibu hamil.', 'harga' => 1200000.00, 'stok' => 6, 'kategori' => 'gaun', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Gaun+Maternity+Pengantin'],
            ['nama' => 'Dekorasi Ruang Pengantin', 'deskripsi' => 'Dekorasi ruang pengantin yang nyaman.', 'harga' => 900000.00, 'stok' => 11, 'kategori' => 'dekorasi', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Dekorasi+Ruang+Pengantin'],
            ['nama' => 'Pelaminan Classic', 'deskripsi' => 'Pelaminan dengan desain klasik dan elegan.', 'harga' => 2500000.00, 'stok' => 3, 'kategori' => 'pelaminan', 'url_gambar' => 'https://via.placeholder.com/640x480?text=Pelaminan+Classic'],
        ];

        DB::table('barang')->insert($data);
    }

}
