<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KITA KOSONGKAN DULU BIAR GAK DOBEL
        DB::table('produks')->truncate();

        $data = [
            // --- SERBA CEMILAN ---
            [
                'nama_produk' => 'Mantou Srikaya',
                'harga' => 20000,
                'deskripsi' => 'Mantou lembut dengan isi srikaya yang manis dan legit.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kentang Goreng Original',
                'harga' => 20000,
                'deskripsi' => 'Kentang goreng renyah dengan saus tomat segar.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Corndog Full Mozarella + Sosis',
                'harga' => 24000,
                'deskripsi' => 'Corndog keju mozarella dan sosis, adonan tepung renyah.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Churros Coklat',
                'harga' => 25000,
                'deskripsi' => 'Churros manis dengan saus coklat lezat.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Sosis Solo',
                'harga' => 25000,
                'deskripsi' => 'Camilan khas Solo dengan kulit lembut dan isi gurih.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Samosa',
                'harga' => 19000,
                'deskripsi' => 'Camilan berbentuk segitiga isi kentang dan rempah.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Gohyong',
                'harga' => 28000,
                'deskripsi' => 'Camilan khas Tionghoa-Indonesia dengan daging cincang.',
                'created_at' => now(), 'updated_at' => now()
            ],

            // --- KEBAB ---
            [
                'nama_produk' => 'Kebab dan LulKomplit',
                'harga' => 38000,
                'deskripsi' => 'Kebab isi telur, keju, daging, sayuran segar, dan secret sauce.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kebab dan Lulfried Fries',
                'harga' => 32000,
                'deskripsi' => 'Kebab isi daging, timun, wortel, dan kentang goreng renyah.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kebab Daging Alulicious',
                'harga' => 22000,
                'deskripsi' => 'Tortilla isi daging homemade, saus spesial, selada, dan timun.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kebab Ayam Alulicious',
                'harga' => 21000,
                'deskripsi' => 'Tortilla isi daging ayam, saus spesial, selada, dan timun.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kebab Alula Telur',
                'harga' => 14000,
                'deskripsi' => 'Kebab isi telur dan sayuran segar dengan saus spesial.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Kebab Alula Special',
                'harga' => 28500,
                'deskripsi' => 'Smoke beef, telur, keju, dan saus rahasia Alulicious.',
                'created_at' => now(), 'updated_at' => now()
            ],

            // --- DIMSUM ---
            [
                'nama_produk' => 'Dimsum Mix',
                'harga' => 32000,
                'deskripsi' => 'Isi 4 (ayam, kepiting, udang) atau sesuai stok.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Dimsum Rumput Laut',
                'harga' => 32000,
                'deskripsi' => 'Dimsum isi rumput laut, udang, dan ayam.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Lenghongkien',
                'harga' => 27000,
                'deskripsi' => 'Dimsum isi ayam, udang, dan mayonaise.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Lumpia Kulit Tahu',
                'harga' => 27000,
                'deskripsi' => 'Lumpia isi ayam dan udang dengan kulit tahu.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Lumpia Udang Salad',
                'harga' => 27000,
                'deskripsi' => 'Lumpia isi sayur dan udang segar.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Dimsum Kepiting',
                'harga' => 28000,
                'deskripsi' => 'Dimsum dengan daging kepiting gurih.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Dimsum Udang',
                'harga' => 28000,
                'deskripsi' => 'Dimsum isi udang segar dengan rasa lembut.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Dimsum Ayam',
                'harga' => 28000,
                'deskripsi' => 'Dimsum isi ayam cincang dengan bumbu khas.',
                'created_at' => now(), 'updated_at' => now()
            ],

            // --- BURGER ---
            [
                'nama_produk' => 'Cheezy Burger',
                'harga' => 25000,
                'deskripsi' => 'Roti burger isi daging, keju premium, bombay, dan saus spesial.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Burger Paling Special',
                'harga' => 30000,
                'deskripsi' => 'Burger isi daging, telur, keju slice, timun, dan saus rahasia.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Burger Smoked Beef',
                'harga' => 24000,
                'deskripsi' => 'Burger isi smoke beef, sayur, dan saus spesial.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Burger Chicken Crispy',
                'harga' => 22000,
                'deskripsi' => 'Burger ayam crispy dengan mayonaise island.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'nama_produk' => 'Burger Daging',
                'harga' => 23000,
                'deskripsi' => 'Burger daging dengan saus secret dan sayuran segar.',
                'created_at' => now(), 'updated_at' => now()
            ],
        ];

        DB::table('produks')->insert($data);
    }
}