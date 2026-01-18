@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-bold text-center mb-4" style="color: #d81d7b;">Daftar Kategori Alulicious</h3>

    @if(session('success'))
        <div id="success-alert" class="alert fade show small py-2 mb-3 shadow-sm" role="alert" style="background-color: #fce4ec; color: #d81d7b; border: 1px solid #d81d7b; border-radius: 10px;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('kategori.create') }}" class="btn text-white shadow-sm" style="background-color: #d81d7b; border-radius: 50px; padding: 8px 25px;">
            <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 align-middle text-center" style="font-size: 0.9rem;">
                    <thead class="text-white" style="background-color: #d81d7b;">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Kategori</th>
                            <th class="py-3">Keterangan</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td class="text-start ps-3 fw-bold">{{ $row->nama_kategori }}</td>
                            <td class="text-start ps-3 text-muted">{{ $row->keterangan }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-sm text-white py-1 px-3" style="background-color: #d81d7b; font-size: 0.85rem;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" class="form-delete-kategori">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger py-1 px-3 btn-hapus-kategori" style="font-size: 0.85rem;">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
    document.querySelectorAll('.btn-hapus-kategori').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.form-delete-kategori');
            
            Swal.fire({
                title: 'Hapus Kategori?',
                text: "Data ini tidak bisa dikembalikan!",
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