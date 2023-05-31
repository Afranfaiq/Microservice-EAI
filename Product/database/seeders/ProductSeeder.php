<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create();
        $nama =['Pakaian Anak','Sepatu','Perlengkapan Bayi','Parfum','Alat Masak','Perlatan Rumah Tangga'];
        shuffle($nama);

        for ($i = 0; $i < 30; $i++) {

        $data = [
            'nama' =>$nama[$i % count($nama)],
            'harga' => $faker -> numberBetween(150000,400000)
        ];

        Product::create($data);
        }
    }
}
