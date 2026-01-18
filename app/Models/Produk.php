<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    // INI DIA "SURAT IZIN" YANG KURANG TADI
    protected $fillable = [
        'nama_produk', 
        'kategori', // BARU
        'harga', 
        'stok',     // BARU
        'deskripsi', 
        'gambar'
    ];
}