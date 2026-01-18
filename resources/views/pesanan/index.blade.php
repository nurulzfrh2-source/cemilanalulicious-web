@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="fw-bold text-center mb-4" style="color: #d81d7b;">Daftar Pesanan Alulicious</h3>

    @if(session('success'))
        <div id="success-alert" class="alert fade show small py-2 mb-3 shadow-sm" role="alert" style="background-color: #fce4ec; color: #d81d7b; border: 1px solid #d81d7b; border-radius: 10px;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 align-middle text-center" style="font-size: 0.9rem;">
                    <thead class="text-white" style="background-color: #d81d7b;">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Pemesan</th>
                            <th class="py-3">No. WhatsApp</th>
                            <th class="py-3">Produk</th>
                            <th class="py-3">Total Harga</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rows as $row)
                        <tr>
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td class="fw-bold text-dark">{{ $row->nama_pemesan }}</td>
                            <td>{{ $row->nomor_wa }}</td>
                            <td class="text-start ps-3">{{ $row->produk_dipesan }}</td>
                            <td class="fw-bold" style="color: #d81d7b;">Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('pesanan.updateStatus', $row->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm fw-bold border-info text-info mx-auto" style="font-size: 0.85rem; width: 160px;" onchange="this.form.submit()">
                                        <option value="Menunggu Konfirmasi" {{ $row->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                        <option value="Diproses" {{ $row->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Selesai" {{ $row->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Dibatalkan" {{ $row->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('pesanan.destroy', $row->id) }}" method="POST" class="form-delete-pesanan">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger py-1 px-3 btn-hapus-pesanan" style="font-size: 0.85rem;">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-5 text-muted fst-italic">
                                <i class="bi bi-cart-x fs-2 d-block mb-2"></i>
                                Belum ada pesanan yang masuk.
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

    // 2. Logika SweetAlert Pink untuk Hapus
    document.querySelectorAll('.btn-hapus-pesanan').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.form-delete-pesanan');
            Swal.fire({
                title: 'Hapus Pesanan?',
                text: "Data ini akan hilang permanen!",
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