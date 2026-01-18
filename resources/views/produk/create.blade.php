@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4" style="color: #d81d7b;">Tambah Produk Baru</h3>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4">
            <form action="{{ url('produk') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" placeholder="Contoh: Dimsum Mix 4" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->nama_kategori }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Foto Produk</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn text-white px-4 py-2 shadow-sm" style="background-color: #d81d7b; border-radius: 8px;">
                        <i class="bi bi-box-arrow-in-down me-2"></i> Simpan Produk
                    </button>
                    <a href="{{ url('produk') }}" class="btn px-4 py-2" style="background-color: #6c757d; color: white; border-radius: 8px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection