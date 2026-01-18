<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'nama_pemesan',
        'nomor_wa',
        'alamat',
        'produk_dipesan',
        'total_harga',
        'status'
    ];
}