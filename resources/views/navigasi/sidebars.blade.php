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
            transition: width 0.3s ease, left 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            white-space: nowrap;
            transition: opacity 0.3s ease;
        }

        .sidebar.collapsed .logo span {
            display: none;
        }

        .sidebar .logo img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar.collapsed .logo img {
            margin-right: 0;
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
            white-space: nowrap;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            transition: transform 0.3s ease;
            min-width: 20px;
            text-align: center;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
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
            width: 100%;
            text-align: left;
        }

        .btn-logout:hover {
            color: #ff4b5c;
            transform: translateX(5px);
        }

        .sidebar.collapsed .btn-logout span {
            display: none;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            margin-bottom: 20px;
            cursor: pointer;
        }

        /* Tombol hamburger untuk mobile */
        .mobile-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: rgb(49, 172, 225);
            border: none;
            color: white;
            font-size: 1.5rem;
            padding: 10px;
            border-radius: 6px;
            display: none;
        }

        /* Overlay saat sidebar aktif */
        .overlay-active::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.4);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .mobile-toggle {
                display: block;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -260px;
                height: 100%;
                z-index: 1000;
                width: 250px;
            }

            .sidebar.open {
                left: 0;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            body {
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                padding-left: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Toggle Button for Mobile -->
    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <!-- Sidebar -->
<div class="sidebar" id="sidebars">
    <div class="logo">
        <img src="{{ asset('upload/Logo.jpg') }}" alt="Logo" width="40" height="40">
        <span>VokeTrack</span>
    </div>

    <nav class="nav flex-column">
        <a class="nav-link" href="/scans"><i class="fas fa-qrcode"></i> Scan</a>
        <a class="nav-link" href="/barangsiswa"><i class="fas fa-boxes"></i> Daftar Barang</a>
        <a class="nav-link" href="/peminjamsiswa"><i class="fas fa-hand-holding"></i> Peminjaman</a>
        <a class="nav-link" href="/pengembalians"><i class="fas fa-undo-alt"></i> Pengembalian</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-logout mt-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i><span>Logout</span>
            </button>
        </form>
    </nav>
</div>


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toggle Script -->
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebars');
        sidebar.classList.toggle('open');
        document.body.classList.toggle('overlay-active');
    }
    </script>
</body>
</html>
