@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-4" style="color: #d81d7b;">Edit Kategori</h3>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4">
            <form action="{{ url('kategori/'.$row->id) }}" method="POST">
                @csrf 
                @method('PATCH')
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $row->nama_kategori }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4" required>{{ $row->keterangan }}</textarea>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn text-white px-4 py-2 shadow-sm d-flex align-items-center" style="background-color: #d81d7b; border-radius: 8px;">
                        <i class="bi bi-arrow-repeat me-2"></i> Update Data
                    </button>
                    <a href="{{ url('kategori') }}" class="btn px-4 py-2" style="background-color: #6c757d; color: white; border-radius: 8px;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection