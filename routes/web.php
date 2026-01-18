<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes (Peta Jalan Alulicious)
|--------------------------------------------------------------------------
*/

// ====================================================
// 1. AREA CUSTOMER (Halaman Depan)
// ====================================================
Route::get('/', [OrderController::class, 'index'])->name('welcome');
Route::post('/kirim-pesanan', [OrderController::class, 'pesan']);


// ====================================================
// 2. AREA AUTH (Login & Register)
// ====================================================
Auth::routes();


// ====================================================
// 3. AREA ADMIN (Dashboard)
// ====================================================
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


// ====================================================
// 4. MANAJEMEN DATA (CRUD)
// ====================================================
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);

// Rute Tambahan untuk Update Status Pesanan (PENTING)
Route::patch('/pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::resource('pesanan', PesananController::class);


// ====================================================
// 5. LINK SAKTI (VERSI FINAL + KATEGORI)
// ====================================================
Route::get('/isi-data-sekarang', function() {
    
    // 1. Reset Database Total (Membersihkan sisa error)
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh');

    // 2. Buat User Admin
    \App\Models\User::create([
        'name' => 'Admin Alulicious',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password123')
    ]);

    // 3. ISI DATA KATEGORI
    $listKategori = [
        'Serba Cemilan Alulicious',
        'Kebabs dan Lulfried Fries',
        'Kebab Alulicious',
        'Dimsum Per/Porsi',
        'Burger Alulicious'
    ];

    foreach($listKategori as $kat) {
        \App\Models\Kategori::create([
            'nama_kategori' => $kat,
            'keterangan'    => 'Menu favorit pelanggan'
        ]);
    }

    // 4. ISI DATA PRODUK (23 Item Lengkap)
    $menu = [
        ['Mantou Srikaya', 'Serba Cemilan Alulicious', 20000, 10, 'Mantou lembut isi srikaya manis legit.'],
        ['Kentang Goreng Original', 'Serba Cemilan Alulicious', 20000, 15, 'Kentang goreng renyah saus tomat.'],
        ['Corndog Full Mozarella', 'Serba Cemilan Alulicious', 24000, 20, 'Corndog keju mozarella lumer.'],
        ['Churros Coklat', 'Serba Cemilan Alulicious', 25000, 12, 'Churros manis saus coklat.'],
        ['Sosis Solo', 'Serba Cemilan Alulicious', 25000, 25, 'Camilan khas Solo isi daging.'],
        ['Samosa', 'Serba Cemilan Alulicious', 19000, 20, 'Segitiga isi kentang kari.'],
        ['Gohyong', 'Serba Cemilan Alulicious', 28000, 10, 'Camilan ayam cincang khas viral.'],
        ['Kebab dan LulKomplit', 'Kebabs dan Lulfried Fries', 38000, 15, 'Kebab isi telur, keju, daging, sayur.'],
        ['Kebab dan Lulfried Fries', 'Kebabs dan Lulfried Fries', 32000, 15, 'Paket Kebab + Kentang Goreng.'],
        ['Kebab Daging Alulicious', 'Kebab Alulicious', 22000, 30, 'Kebab daging sapi homemade.'],
        ['Kebab Ayam Alulicious', 'Kebab Alulicious', 21000, 30, 'Kebab daging ayam panggang.'],
        ['Kebab Alula Telur', 'Kebab Alulicious', 14000, 40, 'Kebab ekonomis isi telur.'],
        ['Kebab Alula Special', 'Kebab Alulicious', 28500, 25, 'Smoke beef, telur, keju.'],
        ['Dimsum Mix', 'Dimsum Per/Porsi', 32000, 50, 'Isi 4 (ayam, kepiting, udang).'],
        ['Dimsum Rumput Laut', 'Dimsum Per/Porsi', 32000, 50, 'Dimsum balut nori.'],
        ['Lenghongkien', 'Dimsum Per/Porsi', 27000, 50, 'Udang mayonaise khas Medan.'],
        ['Lumpia Kulit Tahu', 'Dimsum Per/Porsi', 27000, 50, 'Lumpia goreng kulit tahu.'],
        ['Dimsum Udang', 'Dimsum Per/Porsi', 28000, 50, 'Full udang segar.'],
        ['Cheezy Burger', 'Burger Alulicious', 25000, 20, 'Burger banjir keju.'],
        ['Burger Paling Special', 'Burger Alulicious', 30000, 15, 'Daging + Telur + Keju.'],
        ['Burger Smoked Beef', 'Burger Alulicious', 24000, 20, 'Burger daging asap.'],
        ['Burger Chicken Crispy', 'Burger Alulicious', 22000, 20, 'Burger ayam krispi.'],
        ['Burger Daging', 'Burger Alulicious', 23000, 20, 'Burger daging sapi original.']
    ];

    foreach($menu as $item) {
        \App\Models\Produk::create([
            'nama_produk' => $item[0],
            'kategori'    => $item[1],
            'harga'       => $item[2],
            'stok'        => $item[3],
            'deskripsi'   => $item[4]
        ]);
    }

    return "<div style='text-align:center; padding:50px; font-family:sans-serif;'>
            <h1 style='color:green'>PEMULIHAN SUKSES! ✅</h1> 
            <p>Data Produk: <strong>23 Item</strong> (Masuk)</p>
            <p>Data Kategori: <strong>5 Kategori</strong> (Masuk)</p>
            <p>User Admin: <strong>admin@gmail.com</strong> (Reset)</p>
            <br>
            <a href='/kategori' style='background:#d81d7b; color:white; padding:10px 20px; text-decoration:none; border-radius:5px; margin-right:10px;'>
                Cek Kategori
            </a>
            <a href='/produk' style='background:#333; color:white; padding:10px 20px; text-decoration:none; border-radius:5px; margin-right:10px;'>
                Cek Produk
            </a>
            <a href='/pesanan' style='background:#d81d7b; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;'>
                Cek Pesanan
            </a>
            </div>";
});