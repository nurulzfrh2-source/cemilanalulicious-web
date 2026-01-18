<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemilan Alulicious - Rasanya Bikin Nagih!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; overflow-x: hidden; }
        .navbar-custom { background-color: transparent; padding: 1.5rem 0; transition: all 0.3s; }
        .hero-section {
            background: linear-gradient(135deg, #d81d7b 0%, #ff80ab 100%);
            color: white; padding-top: 8rem; padding-bottom: 6rem;
            border-bottom-left-radius: 50% 20%; border-bottom-right-radius: 50% 20%;
        }
        .btn-white { background-color: white; color: #d81d7b; font-weight: bold; border-radius: 50px; padding: 10px 30px; }
        .btn-white:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); background-color: #fce4ec; color: #b01563; }
        .btn-outline-white { border: 2px solid rgba(255,255,255,0.8); color: white; font-weight: bold; border-radius: 50px; padding: 8px 25px; }
        .btn-outline-white:hover { background-color: white; color: #d81d7b; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .icon-box { width: 70px; height: 70px; background-color: #fce4ec; color: #d81d7b; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#"><i class="bi bi-shop-window me-2"></i> Cemilan Alulicious</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2 align-items-center">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="btn btn-white btn-sm">Dashboard Admin</a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white fw-semibold small">Login Admin</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-white btn-sm">Daftar Admin</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <span class="badge bg-white text-danger mb-3 px-3 py-2 rounded-pill shadow-sm">🔥 Rasanya Nampol!</span>
                    <h1 class="display-3 fw-bold mb-4">Rasakan Sensasi<br>Cemilan Juara</h1>
                    <p class="lead mb-5 opacity-75">Dimsum, Kebab, Burger? Semua ada di sini!</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#produk" class="btn btn-white btn-lg shadow">Lihat Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="produk" class="py-5 bg-light" style="margin-top: -50px; padding-top: 80px !important;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="color: #d81d7b;">Menu Favorit</h2>
                <p class="text-muted">Pilih cemilan kesukaanmu dan pesan langsung!</p>
            </div>

            <div class="row g-4">
                @forelse($produks as $produk)
                <div class="col-md-3 col-6">
                    <div class="card h-100 border-0 shadow-sm" style="overflow: hidden; border-radius: 15px;">
                        
                        <div style="height: 150px; background-color: #fce4ec; display: flex; align-items: center; justify-content: center; color: #d81d7b;">
                            @if($produk->gambar)
                                <img src="{{ asset('images/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <i class="bi bi-bag-heart-fill fs-1"></i>
                            @endif
                        </div>

                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-1">{{ $produk->nama_produk }}</h5>
                            <p class="text-muted small mb-2">{{ \Illuminate\Support\Str::limit($produk->deskripsi, 40) }}</p>
                            <h6 class="text-danger fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h6>
                            <button type="button" class="btn btn-sm text-white mt-2 w-100 rounded-pill" style="background-color: #d81d7b;" 
                                data-bs-toggle="modal" data-bs-target="#orderModal" 
                                onclick="isiModal('{{ $produk->id }}', '{{ $produk->nama_produk }}', '{{ $produk->harga }}')">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada produk yang tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4"><div class="card border-0 shadow-sm p-4 text-center h-100"><div class="icon-box"><i class="bi bi-fire"></i></div><h5 class="fw-bold">Rasanya Nampol</h5><p class="text-muted small">Dijamin bikin kamu ga move on!</p></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm p-4 text-center h-100"><div class="icon-box"><i class="bi bi-wallet2"></i></div><h5 class="fw-bold">Harga Mahasiswa</h5><p class="text-muted small">Enak gak harus mahal, pas di kantong.</p></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm p-4 text-center h-100"><div class="icon-box"><i class="bi bi-check-circle-fill"></i></div><h5 class="fw-bold">100% Halal</h5><p class="text-muted small">Bahan terjamin bersih dan halal.</p></div></div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-4 mt-5 border-top">
        <div class="container text-center">
            <p class="mb-0 text-muted">&copy; {{ date('Y') }} <strong>Cemilan Alulicious</strong>. All Rights Reserved.</p>
        </div>
    </footer>

    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #d81d7b;">
                    <h5 class="modal-title fw-bold">Form Pemesanan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="formPesanan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="produk_id" id="modal_produk_id">
                        <div class="alert alert-info py-2 small">Kamu memesan: <strong id="modal_nama_produk">...</strong></div>
                        <div class="mb-3"><label class="small fw-bold">Nama</label><input type="text" name="nama_pemesan" class="form-control" required></div>
                        <div class="mb-3"><label class="small fw-bold">No. WhatsApp</label><input type="number" name="nomor_hp" class="form-control" required></div>
                        <div class="mb-3"><label class="small fw-bold">Jumlah</label><input type="number" name="jumlah_pesanan" class="form-control" value="1" min="1" required></div>
                        <div class="mb-3"><label class="small fw-bold">Alamat</label><textarea name="alamat_kirim" class="form-control" rows="2" required></textarea></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn text-white px-4" style="background-color: #d81d7b;">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.addEventListener('scroll', function() {
            var nav = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                nav.style.backgroundColor = 'rgba(216, 29, 123, 0.95)';
                nav.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
                nav.style.padding = '0.8rem 0';
            } else {
                nav.style.backgroundColor = 'transparent';
                nav.style.boxShadow = 'none';
                nav.style.padding = '1.5rem 0';
            }
        });

        function isiModal(id, nama, harga) {
            document.getElementById('modal_produk_id').value = id;
            document.getElementById('modal_nama_produk').innerText = nama + " (@ Rp " + new Intl.NumberFormat('id-ID').format(harga) + ")";
        }

        document.querySelector('#formPesanan').addEventListener('submit', function(e) {
            e.preventDefault(); 
            Swal.fire({ title: 'Memproses...', allowOutsideClick: false, didOpen: () => { Swal.showLoading(); } });

            const formData = new FormData(this);
            fetch("{{ url('/kirim-pesanan') }}", {
                method: "POST",
                body: formData,
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" }
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    Swal.fire({
                        title: 'Konfirmasi Pesanan',
                        text: "Data pesanan Anda sudah tercatat. Lanjut konfirmasi ke WhatsApp?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#d81d7b',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Konfirmasi WhatsApp',
                        cancelButtonText: 'Edit Pesanan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Mohon Konfirmasi Kembali',
                                text: "Silakan tekan tombol 'Kirim' di WhatsApp agar pesanan segera kami proses.",
                                icon: 'info',
                                confirmButtonColor: '#d81d7b'
                            }).then(() => {
                                window.open("https://wa.me/6285157244871?text=" + data.pesan_wa, '_blank');
                                location.reload(); 
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>