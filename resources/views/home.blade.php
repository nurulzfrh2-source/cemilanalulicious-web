@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="row mb-4 mt-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(45deg, #d81d7b, #ff7eb3); border-radius: 12px;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div class="ms-3">
                        <h4 class="fw-bold mb-1">Halo, {{ Auth::user()->name }}! 👋</h4>
                        <p class="mb-0 opacity-75">Selamat datang di Panel Admin Cemilan Alulicious.</p>
                    </div>
                    <i class="bi bi-shop-window d-none d-md-block me-3" style="font-size: 2.2rem; opacity: 0.8;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 10px;">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="bg-light rounded-circle p-3 me-3 text-center d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                        <i class="bi bi-tags-fill fs-3" style="color: #d81d7b;"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 small fw-bold">TOTAL KATEGORI</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $totalKategori }}</h4> 
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-2 border-top">
                    <a href="{{ url('kategori') }}" class="text-decoration-none fw-semibold small" style="color: #d81d7b;">
                        Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 10px;">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="bg-light rounded-circle p-3 me-3 text-center d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                        <i class="bi bi-box-seam-fill fs-3 text-warning"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 small fw-bold">TOTAL PRODUK</h6>
                        <h4 class="fw-bold mb-0 text-dark">{{ $totalProduk }}</h4>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-2 border-top">
                    <a href="{{ url('produk') }}" class="text-decoration-none fw-semibold small text-warning">
                        Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 10px;">
                <div class="card-body d-flex align-items-center p-3">
                    <div class="bg-light rounded-circle p-3 me-3 text-center d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                        <i class="bi bi-cart-check-fill fs-3 text-success"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1 small fw-bold">PESANAN BARU</h6>
                        <h4 class="fw-bold mb-0 text-success">{{ $pesananBaru }}</h4>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-2 border-top">
                    <a href="{{ url('pesanan') }}" class="text-decoration-none fw-semibold small text-success">
                        Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body text-center py-4">
                    <div class="mb-2">
                        <i class="bi bi-bar-chart-line" style="font-size: 3.5rem; color: #fce4ec;"></i>
                    </div>
                    <h5 class="fw-bold text-secondary">Siap Mengelola Toko?</h5>
                    <p class="text-muted mx-auto mb-4" style="max-width: 550px;">
                        Gunakan menu navigasi untuk menambah produk baru, memantau pesanan masuk, atau mengatur kategori menu Alulicious.
                    </p>
                    <a href="{{ url('kategori/create') }}" class="btn text-white px-5 rounded-pill shadow-sm" style="background-color: #d81d7b; font-weight: 500;">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Data Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection