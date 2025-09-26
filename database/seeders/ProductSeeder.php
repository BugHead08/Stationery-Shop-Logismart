<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Pulpen', 'price' => 3500, 'image' => 'Pulpen.jpg', 'stock' => 20],
            ['name' => 'Pensil', 'price' => 4000, 'image' => 'Pensil.jpg','stock' => 20],
            ['name' => 'Penggaris', 'price' => 7500, 'image' => 'Penggaris.jpg', 'stock' => 20],
            ['name' => 'Buku Tulis', 'price' => 7000, 'image' => 'Buku_Tulis.jpg', 'stock' => 20],
            ['name' => 'Buku Gambar', 'price' => 12500, 'image' => 'Buku_Gambar.jpg', 'stock' => 20],
            ['name' => 'Tipe X Cair', 'price' => 3500, 'image' => 'Tipe_X_Cair.jpg', 'stock' => 20],
            ['name' => 'Penghapus', 'price' => 1000, 'image' => 'Penghapus.jpg', 'stock' => 20],
            ['name' => 'Pensil Warna', 'price' => 20000, 'image' => 'Pensil_Warna.jpg', 'stock' => 20],


        ]);
    }
}
