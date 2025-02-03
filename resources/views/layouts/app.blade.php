<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        #wrapper {
            display: flex;
            flex-grow: 1;
        }

        #sidebar-wrapper {
            background-color: #343a40;
            color: #fff;
            width: 280px;
            transition: margin-left 0.4s ease-in-out;
            overflow-y: auto;
            max-height: 100vh;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -280px;
        }

        .sidebar-heading {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffc107;
        }

        .list-group-item {
            background-color: #343a40;
            color: #ddd;
        }

        .list-group-item:hover {
            background-color: #495057;
            color: #fff;
        }

        .list-group-item i {
            margin-right: 10px;
        }

        #page-content-wrapper {
            flex-grow: 1;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 100vh;
            padding: 20px;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-text {
            color: #343a40;
            font-weight: bold;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-end" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4">
                <h4>Asset Management</h4>
            </div>
            <div class="list-group list-group-flush">
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('kategori-asset.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-layer-group"></i>Kategori Asset</a>

                <a href="{{ route('sub-kategori-asset.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-list-alt"></i>Sub Kategori Asset</a>

                <a href="{{ route('distributor.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-truck"></i>Distributor</a>

                <a href="{{ route('merk.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-tag"></i>Merk</a>

                <a href="{{ route('satuan.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-balance-scale"></i>Satuan</a>

                <a href="{{ route('master-barang.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-boxes"></i>Master Barang</a>
                @endif
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.depresiasi.index')  : route('depresiasi.index')}}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-calculator"></i>Depresiasi</a>

                <a href="{{ auth()->user()->role === 'admin' ? route('admin.pengadaan.index')  : route('pengadaan.index')}}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-shopping-cart"></i>Pengadaan</a>
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('lokasi.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-map-marker-alt"></i>Lokasi</a>

                <a href="{{ route('mutasi-lokasi.index') }}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-exchange-alt"></i>Mutasi Lokasi</a>
                @endif
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.opname.index')  : route('opname.index')}}" class="py-4 list-group-item list-group-item-action">
                    <i class="fas fa-clipboard-check"></i>Opname</a>
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('hitung-depresiasi.index') }}" class="py-3 list-group-item list-group-item-action">
                    <i class="fas fa-chart-line"></i>Hitung Depresiasi</a>
                @endif
                <a href="#" class="list-group-item list-group-item-action text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                    <span class="navbar-text ms-auto">
                        Welcome, {{ Auth::user()->name ?? 'User' }}
                    </span>
                </div>
            </nav>
            <div class="container-fluid py-4">
                @yield('content')
            </div> 
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('wrapper').classList.toggle('toggled');
        });
    </script>

      <!-- Footer -->
      <footer>
        <div class="container">
            <div class="row">
                <!-- Quick Links Section -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('kategori-asset.index') }}" class="text-light text-decoration-none"><i class="fas fa-layer-group me-2"></i>Kategori Asset</a></li>
                        <li><a href="{{ route('distributor.index') }}" class="text-light text-decoration-none"><i class="fas fa-truck me-2"></i>Distributor</a></li>
                        <li><a href="{{ route('lokasi.index') }}" class="text-light text-decoration-none"><i class="fas fa-map-marker-alt me-2"></i>Lokasi</a></li>
                    </ul>
                </div>

                <!-- Follow Us Section -->
                <div class="col-md-6 text-center">
                    <h5 class="text-uppercase mb-3">Follow Us</h5>
                    <div class="d-flex justify-content-center">
                        <a href="https://facebook.com" class="text-light me-3" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="https://twitter.com" class="text-light me-3" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="https://instagram.com" class="text-light" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="text-center mt-4">
                <p class="mb-0">&copy; Ibraa </p>
            </div>
        </div>
    </footer>
</body>
  
</html>
