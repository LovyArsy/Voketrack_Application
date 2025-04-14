<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: rgb(49, 172, 225);
            padding: 20px 15px;
            flex-shrink: 0;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .sidebar .logo img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
            box-shadow: 2px 2px 8px rgba(139, 216, 255, 0.3);
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.2);
        }

        .btn-logout {
            background: transparent;
            border: none;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
            padding: 10px 15px;
        }

        .btn-logout:hover {
            color: #ff4b5c;
            transform: translateX(5px);
        }

        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f5f7fa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('upload/Logo.jpg') }}" alt="Logo" width="40" height="40">
            VokeTrack
        </div>

        <nav class="nav flex-column">
            <a class="nav-link" href="/scan"><i class="fas fa-qrcode"></i> Scan</a>
            <a class="nav-link" href="/barang"><i class="fas fa-boxes"></i> Daftar Barang</a>
            <a class="nav-link" href="/peminjams"><i class="fas fa-hand-holding"></i> Peminjaman</a>
            <a class="nav-link" href="/pengembalian"><i class="fas fa-undo-alt"></i> Pengembalian</a>
            <a class="nav-link" href="/daftarpeminjaman"><i class="fas fa-clipboard-list"></i> Data Pinjam</a>
            <a class="nav-link" href="/daftarpengembalian"><i class="fas fa-history"></i> Data Kembali</a>
            <a class="nav-link" href="/guru"><i class="fas fa-user-cog"></i> Data Akun</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-logout mt-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="content">
        <!-- Halaman utama di sini -->
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
