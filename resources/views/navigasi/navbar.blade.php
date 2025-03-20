<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Navbar</title>
    <style>
        .navbar {
            background: rgb(49, 172, 225) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            position: fixed;
        }

        .navbar-brand img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: rgb(255, 255, 255) !important;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #8bd8ff !important;
        }

        .btn-logout {
            background: transparent; /* Ubah background menjadi transparan */
            border: none;
            padding: 8px;
            color: #d32f2f; /* Ubah warna ikon menjadi merah tua */
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-logout:hover {
            transform: scale(1.1);
            color: #ff4b5c; /* Ubah warna saat hover */
        }

        /* Tombol Logout di mobile tetap terlihat */
        .d-lg-none {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid px-3">
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <img src="{{ asset('upload/Logo.jpg') }}" alt="Logo" width="40" height="40">
                <span><b>VokeTrack</b></span>
            </a>
            
            <!-- Ikon Logout untuk tampilan mobile -->
            <a href="#" class="btn btn-logout d-lg-none">
                <i class="fas fa-sign-out-alt"></i>
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/scan">Scan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/peminjams">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengembalian">Pengembalian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daftarpeminjaman">Data Pinjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daftarpengembalian">Data Kembali</a>
                    </li>
                </ul>
            </div>

            <!-- Ikon Logout untuk tampilan besar -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a href="#" class="btn btn-logout d-none d-lg-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </nav>
</body>
</html>
