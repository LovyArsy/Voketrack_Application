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
            height: 100%;
        }

        .sidebar {
            width: 250px;
            border: black;
            background-color: rgb(49, 172, 225);
            /* box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); */
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

        .content {
            flex-grow: 1;
            /* padding: 30px; */
        }

        .btn-logout {
            background: transparent;
            border: none;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-logout:hover {
            color: #ff4b5c;
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
            <a class="nav-link" href="/scans"><i class="fas fa-qrcode"></i> Scan</a>
            <a class="nav-link" href="/barangsiswa"><i class="fas fa-boxes"></i> Daftar Barang</a>
            <a class="nav-link" href="/peminjamsiswa"><i class="fas fa-hand-holding"></i> Peminjaman</a>
            <a class="nav-link" href="/pengembalians"><i class="fas fa-undo-alt"></i> Pengembalian</a>

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

    <!-- Bootstrap JS (Opsional, untuk collapse dsb) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
