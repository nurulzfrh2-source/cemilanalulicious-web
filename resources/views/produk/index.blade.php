@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <h3 class="fw-bold text-center mb-4" style="color: #d81d7b;">
        Manajemen Produk Alulicious
    </h3>

    @if(session('success'))
        <div id="success-alert" class="alert fade show small py-2 mb-3 shadow-sm" role="alert" style="background-color: #fce4ec; color: #d81d7b; border: 1px solid #d81d7b; border-radius: 10px;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ url('produk/create') }}" class="btn text-white shadow-sm" style="background-color: #d81d7b; border-radius: 50px; padding: 8px 25px;">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk Baru
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 align-middle text-center" style="font-size: 0.9rem;">
                    <thead class="text-white" style="background-color: #d81d7b;">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Produk</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Harga (Rp)</th>
                            <th class="py-3">Stok</th>
                            <th class="py-3">Deskripsi</th>
                            <th class="py-3">Gambar</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rows as $row)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-bold text-start ps-3">{{ $row->nama_produk }}</td>
                            <td><span class="badge bg-secondary" style="font-size: 0.8rem;">{{ $row->kategori }}</span></td>
                            <td class="text-end pe-3 fw-bold" style="color: #d81d7b;">
                                {{ number_format($row->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($row->stok > 0)
                                    <span class="badge bg-success" style="font-size: 0.8rem;">{{ $row->stok }}</span>
                                @else
                                    <span class="badge bg-danger" style="font-size: 0.8rem;">Habis</span>
                                @endif
                            </td>
                            <td class="small text-start ps-3 text-muted">{{ \Illuminate\Support\Str::limit($row->deskripsi, 50) }}</td>
                            
                            <td>
                                @if($row->gambar)
                                    <img src="{{ asset('images/' . $row->gambar) }}" width="60" height="60" style="object-fit: cover; border-radius: 10px;" class="shadow-sm border">
                                @else
                                    <span class="badge bg-light text-muted fw-normal" style="font-size: 0.75rem;">No Image</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ url('produk/'.$row->id.'/edit') }}" class="btn btn-sm text-white py-1 px-3" style="background-color: #d81d7b; border: none; font-size: 0.85rem;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ url('produk/'.$row->id) }}" method="POST" class="form-delete-produk">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger border-0 py-1 px-3 btn-hapus-produk" style="font-size: 0.85rem;">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-box-seam fs-1 d-block mb-2"></i> Belum ada produk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // 1. Logika Menghilangkan Notifikasi Otomatis (3 Detik)
    const alertSuccess = document.getElementById('success-alert');
    if (alertSuccess) {
        setTimeout(() => {
            alertSuccess.style.transition = "opacity 0.8s ease";
            alertSuccess.style.opacity = "0";
            setTimeout(() => alertSuccess.remove(), 800);
        }, 3000); 
    }

    // 2. Logika SweetAlert untuk Hapus
    document.querySelectorAll('.btn-hapus-produk').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.form-delete-produk');
            Swal.fire({
                title: 'Hapus Produk?',
                text: "Data produk ini akan hilang permanen!",
                icon: 'warning',
                iconColor: '#d81d7b',
                width: '350px',
                showCancelButton: true,
                confirmButtonColor: '#d81d7b',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    title: 'fw-bold fs-5',
                    popup: 'rounded-4 shadow'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
@endsection