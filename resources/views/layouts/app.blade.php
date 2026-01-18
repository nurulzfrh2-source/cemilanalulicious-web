<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cemilan Alulicious - Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { 
            overflow-x: hidden; 
            background-color: #f8f9fa; 
            font-family: 'Poppins', sans-serif;
        }

        #wrapper { 
            display: flex; 
            width: 100%; 
            transition: all 0.3s ease;
        }

        /* --- SIDEBAR STYLE --- */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 220px; 
            background-color: #d81d7b; /* Pink Alulicious */
            color: white;
            transition: margin 0.3s ease;
            flex-shrink: 0;
            display: flex;
            flex-direction: column; 
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -220px; 
        }

        .sidebar-heading {
            letter-spacing: 1px;
            background: rgba(0,0,0,0.1);
        }

        /* --- MENU ITEMS --- */
        .list-group-item {
            background-color: transparent;
            color: rgba(255,255,255,0.8);
            border: none;
            padding: 12px 25px;
            font-size: 1.03rem;
            border-left: 4px solid transparent;
            transition: 0.2s;
        }

        .list-group-item:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        .list-group-item.active {
            background-color: rgba(255,255,255,0.2) !important;
            color: white !important;
            font-weight: bold;
            border-left: 4px solid white;
        }

        /* --- FOOTER/LOGOUT SECTION --- */
        .sidebar-footer {
            margin-top: auto; 
            padding-bottom: 15px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .btn-logout-sidebar {
            color: white !important;
            font-weight: 600;
            opacity: 0.9;
        }

        .btn-logout-sidebar:hover {
            opacity: 1;
            background-color: rgba(255,255,255,0.1);
        }

        /* --- NAVBAR & CONTENT --- */
        #page-content-wrapper { 
            width: 100%; 
            flex-grow: 1;
        }
        
        .navbar-top {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>

<body>

<div class="d-flex" id="wrapper">
    
    <div id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 fs-5 fw-bold text-white">
            <i class="bi bi-shop-window me-2"></i><br>
            ALULICIOUS
        </div>

        <div class="list-group list-group-flush mt-2">
            <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('dashboard') || Request::is('home') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            
            <a href="{{ url('/kategori') }}" class="list-group-item list-group-item-action {{ Request::is('kategori*') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i> Kategori
            </a>
            
            <a href="{{ url('/produk') }}" class="list-group-item list-group-item-action {{ Request::is('produk*') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Produk
            </a>
            
            <a href="{{ url('/pesanan') }}" class="list-group-item list-group-item-action {{ Request::is('pesanan*') ? 'active' : '' }}">
                <i class="bi bi-receipt me-2"></i> Pesanan
            </a>
        </div>

        <div class="sidebar-footer">
            <a class="list-group-item list-group-item-action btn-logout-sidebar" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-top px-4 py-3 shadow-sm justify-content-between">
            <button class="btn text-white shadow-sm" id="menu-toggle" style="background-color: #d81d7b;">
                <i class="bi bi-list fs-5"></i>
            </button>

            <div class="d-flex align-items-center">
                <div class="text-end me-3 d-none d-md-block">
                    <small class="text-muted d-block">Selamat Datang,</small>
                    <span class="fw-bold" style="color: #d81d7b;">{{ Auth::user()->name ?? 'Admin' }}</span>
                </div>
                <div class="bg-light rounded-circle p-2 border">
                    <i class="bi bi-person-circle fs-4 text-secondary"></i>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>

@stack('scripts')

</body>
</html>