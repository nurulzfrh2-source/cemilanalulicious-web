<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_nama' => 'Burger Alulicious', 'kategori_keterangan' => 'Burger premium dan kombinasi daging keju lezat'],
            ['kategori_nama' => 'Dimsum Per/Porsi', 'kategori_keterangan' => 'Aneka dimsum segar olahan ayam, udang, dan sayur'],
            ['kategori_nama' => 'Kebab Alulicious', 'kategori_keterangan' => 'Kebab dengan isian daging, ayam, dan topping lezat'],
            ['kategori_nama' => 'Kebabs dan Lulfried Fries', 'kategori_keterangan' => 'Aneka kebab dengan kentang goreng'],
            ['kategori_nama' => 'Serba Cemilan Alulicious', 'kategori_keterangan' => 'Aneka cemilan khas Alulicious'],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}