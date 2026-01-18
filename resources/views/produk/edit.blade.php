@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4" style="color: #d81d7b;">Edit Produk</h3>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4">
            <form action="{{ url('produk/'.$row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PATCH')
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="{{ $row->nama_produk }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            @foreach($kategoris as $kat)
                                <option value="{{ $kat->nama_kategori }}" {{ $row->kategori == $kat->nama_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="{{ $row->harga }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $row->stok }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">Foto Produk</label>
                        @if($row->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $row->gambar) }}" width="70" class="img-thumbnail rounded shadow-sm">
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Foto saat ini</small>
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control form-control-sm" accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required>{{ $row->deskripsi }}</textarea>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn text-white px-4 py-2 shadow-sm d-flex align-items-center" style="background-color: #d81d7b; border-radius: 8px;">
                        <i class="bi bi-arrow-repeat me-2"></i> Update Produk
                    </button>
                    <a href="{{ url('produk') }}" class="btn px-4 py-2" style="background-color: #6c757d; color: white; border-radius: 8px;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection