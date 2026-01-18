<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\File; // Penting untuk menghapus file gambar lama

class ProdukController extends Controller
{
    // 1. LIHAT SEMUA PRODUK
    public function index()
    {
        $rows = Produk::all();
        return view('produk.index', compact('rows'));
    }

    // 2. FORM TAMBAH PRODUK
    public function create()
    {
        $kategoris = Kategori::all(); 
        return view('produk.create', compact('kategoris'));
    }

    // 3. SIMPAN KE DATABASE (Lengkap dengan Upload Gambar)
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi file gambar
        ]);

        $data = $request->all();

        // Logika simpan file gambar ke folder public/images
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        Produk::create($data);

        return redirect('produk')->with('success', 'Produk Alulicious berhasil ditambahkan!');
    }

    // 4. FORM EDIT
    public function edit($id)
    {
        $row = Produk::findOrFail($id); 
        $kategoris = Kategori::all();   
        return view('produk.edit', compact('row', 'kategoris'));
    }

    // 5. UPDATE DATA (Lengkap dengan Ganti Gambar)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $row = Produk::findOrFail($id);
        $data = $request->all();

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // 1. Hapus gambar lama dari folder public/images jika ada
            if ($row->gambar && File::exists(public_path('images/' . $row->gambar))) {
                File::delete(public_path('images/' . $row->gambar));
            }

            // 2. Simpan gambar yang baru
            $file = $request->file('gambar');
            $nama_gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        $row->update($data);

        return redirect()->to('produk')->with('success', 'Produk Alulicious berhasil diperbarui!');
    }

    // 6. HAPUS DATA (Lengkap dengan Hapus Gambar dari Storage)
    public function destroy($id)
    {
        $row = Produk::findOrFail($id);

        // Hapus file gambar dari folder sebelum menghapus data di database
        if ($row->gambar && File::exists(public_path('images/' . $row->gambar))) {
            File::delete(public_path('images/' . $row->gambar));
        }

        $row->delete();

        return redirect('produk')->with('success', 'Produk berhasil dihapus dari daftar!');
    }
}