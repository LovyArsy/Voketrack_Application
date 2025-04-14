<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            background-size: cover;
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 998;
        }

        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
        }

        .navbar-top {
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .container-custom {
            flex: 1;
            padding: 25px;
            padding-top: 100px;
        }

        .table {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .table td {
            color: #000000;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover,
        .btn-danger:hover,
        .btn-info:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .container-custom {
                padding: 20px;
                padding-top: 80px;
            }
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    @include('navigasi.sidebar')

    <div class="main-content">
        {{-- Navbar --}}
        <div class="navbar-top">
            @include('navigasi.navbar')
        </div>

        {{-- Konten Utama --}}
        <div class="container-custom">
            <h2 class="text-black text-center">Daftar Alat yang Sedang Dipinjam</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Peminjam</th>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Maximal Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjams as $index => $peminjam)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $peminjam->id }}</td>
                            <td>{{ $peminjam->peminjam->name }}</td>
                            <td>{{ $peminjam->barang->nama }}</td>
                            <td>{{ $peminjam->pinjam_date }}</td>
                            <td>{{ $peminjam->kembali_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
