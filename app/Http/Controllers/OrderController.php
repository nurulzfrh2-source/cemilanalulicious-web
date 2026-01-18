<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;

class OrderController extends Controller
{
    public function index()
    {
        $produks = Produk::all(); 
        return view('welcome', compact('produks'));
    }

    public function pesan(Request $request)
    {
        // Ambil data produk untuk hitung total
        $produk = Produk::find($request->produk_id);
        $total = $produk->harga * $request->jumlah_pesanan;

        // SIMPAN KE DATABASE (Agar muncul di tabel Pesanan Admin)
        Pesanan::create([
            'nama_pemesan'   => $request->nama_pemesan,
            'nomor_wa'       => $request->nomor_hp,
            'alamat'         => $request->alamat_kirim,
            'produk_dipesan' => $produk->nama_produk,
            'total_harga'    => $total,
            'status'         => 'Menunggu Konfirmasi'
        ]);

        // Buat format pesan WA
        $pesanWA = "Halo Admin Alulicious!%0a";
        $pesanWA .= "Saya ingin memesan *{$produk->nama_produk}*%0a";
        $pesanWA .= "Jumlah: {$request->jumlah_pesanan} porsi%0a";
        $pesanWA .= "Total: Rp " . number_format($total, 0, ',', '.') . "%0a";
        $pesanWA .= "Atas nama: {$request->nama_pemesan}";

        return response()->json([
            'status' => 'success',
            'pesan_wa' => $pesanWA
        ]);
    }
}