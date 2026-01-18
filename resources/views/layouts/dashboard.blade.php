<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemilan Alulicious</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Gaya Khusus dari Kode Lama Kamu */
        body { overflow-x: hidden; }
        #wrapper { display: flex; width: 100%; }
        
        #sidebar-wrapper {
            min-height: 100vh;
            width: 15rem; /* Lebar sidebar */
            background-color: #d81d7b; /* Warna PINK Kebanggaan */
            transition: all 0.25s ease;
        }

        #page-content-wrapper {
            width: 100%;
            transition: all 0.25s ease;
        }

        /* Logika Tampilan di HP (Responsive) */
        body.sb-sidenav-toggled #sidebar-wrapper { margin-left: -15rem; }
        
        @media (min-width: 768px) {
            #sidebar-wrapper { margin-left: 0; }
            body.sb-sidenav-toggled #sidebar-wrapper { margin-left: -15rem; }
        }
    </style>
</head>

<body>

<div class="d-flex" id="wrapper">
    
    <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white py-4 ps-3 fw-bold fs-5" style="text-align:left;">
            CEMILAN ALULICIOUS
        </div>

        <div class="list-group list-group-flush">
            
            <a href="{{ url('/home') }}"
               class="list-group-item list-group-item-action border-0 {{ Request::is('home') ? 'bg-white text-dark' : 'text-white' }}"
               style="{{ Request::is('home') ? '' : 'background-color:#d81d7b;' }}">
               <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            <a href="{{ url('/kategori') }}"
               class="list-group-item list-group-item-action border-0 {{ Request::is('kategori*') ? 'bg-white text-dark' : 'text-white' }}"
               style="{{ Request::is('kategori*') ? '' : 'background-color:#d81d7b;' }}">
               <i class="bi bi-tag me-2"></i> Kategori
            </a>

            <a href="{{ url('/produk') }}"
               class="list-group-item list-group-item-action border-0 {{ Request::is('produk*') ? 'bg-white text-dark' : 'text-white' }}"
               style="{{ Request::is('produk*') ? '' : 'background-color:#d81d7b;' }}">
               <i class="bi bi-basket me-2"></i> Produk
            </a>

            <a href="{{ url('/pesanan') }}"
               class="list-group-item list-group-item-action border-0 {{ Request::is('pesanan*') ? 'bg-white text-dark' : 'text-white' }}"
               style="{{ Request::is('pesanan*') ? '' : 'background-color:#d81d7b;' }}">
               <i class="bi bi-receipt me-2"></i> Pesanan
            </a>

            <a class="list-group-item list-group-item-action border-0 text-white" 
               style="background-color:#d81d7b; cursor: pointer;"
               href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </div>

    <div id="page-content-wrapper">
        
        <nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm" style="background-color:#f8d7e0;">
            <div class="container-fluid">
                <button class="btn text-white" id="menu-toggle" style="background-color:#d81d7b;">
                    <i class="bi bi-list"></i>
                </button>
                
                <span class="navbar-text ms-3 fw-semibold" style="color:#d81d7b;">
                    Halo, {{ Auth::user()->name ?? 'Admin' }}
                </span>
            </div>
        </nav>

        <div class="container-fluid p-4">
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById("menu-toggle").onclick = function() {
        document.body.classList.toggle("sb-sidenav-toggled");
    };
</script>

</body>
</html>