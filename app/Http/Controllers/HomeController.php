<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// PENTING: Tiga baris di bawah ini harus ada agar data bisa dipanggil
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pesanan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 1. Menghitung jumlah data otomatis dari Database
        $totalKategori = Kategori::count();
        $totalProduk   = Produk::count();
        
        // 2. Menghitung pesanan yang statusnya 'Menunggu Konfirmasi'
        $pesananBaru   = Pesanan::where('status', 'Menunggu Konfirmasi')->count();

        // 3. Mengirimkan variabel ke tampilan home.blade.php
        return view('home', compact('totalKategori', 'totalProduk', 'pesananBaru'));
    }
}