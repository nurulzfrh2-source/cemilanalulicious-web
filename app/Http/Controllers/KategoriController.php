<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // 1. Tampil Data
    public function index()
    {
        $rows = Kategori::all();
        return view('kategori.index', compact('rows'));
    }

    // 2. Form Tambah
    public function create()
    {
        return view('kategori.create');
    }

    // 3. Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required'
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // 4. FORM EDIT (Tadi ini yang hilang)
    public function edit($id)
    {
        // Mencari data kategori berdasarkan ID, kalau ga ada muncul 404
        $row = Kategori::findOrFail($id);
        return view('kategori.edit', compact('row'));
    }

    // 5. Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required'
        ]);

        $row = Kategori::findOrFail($id);
        $row->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect('kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    // 6. Hapus Data
    public function destroy($id)
    {
        $row = Kategori::findOrFail($id);
        $row->delete();

        return redirect('kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}