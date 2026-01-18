<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Menampilkan daftar semua pesanan
    public function index()
    {
        $rows = Pesanan::latest()->get();
        return view('pesanan.index', compact('rows'));
    }

    // FUNGSI BARU: Update status pesanan (Diproses/Selesai/dll)
    public function updateStatus(Request $request, $id)
    {
        $row = Pesanan::findOrFail($id);
        $row->update([
            'status' => $request->status
        ]);

        return redirect('pesanan')->with('success', 'Status pesanan berhasil diperbarui!');
    }

    // Menghapus pesanan jika diperlukan
    public function destroy($id)
    {
        $row = Pesanan::findOrFail($id);
        $row->delete();

        return redirect('pesanan')->with('success', 'Data pesanan berhasil dihapus!');
    }
}