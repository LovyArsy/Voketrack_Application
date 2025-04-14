<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Dikembalikan - VokeTrack</title>
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
            background: rgba(0, 0, 0, 0.1);
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

        .img-thumbnail {
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
        }

        .no-photo {
            color: red;
            font-style: italic;
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
            <h2 class="text-black text-center">Daftar Barang Dikembalikan</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Maximal Pengembalian</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Bukti Foto</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjams as $index => $peminjam)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $peminjam->id }}</td>
                                <td>{{ $peminjam->barang->nama }}</td>
                                <td>{{ $peminjam->peminjam->name }}</td>
                                <td>{{ $peminjam->pinjam_date }}</td>
                                <td>{{ $peminjam->kembali_date }}</td>
                                <td>{{ $peminjam->kembalinya_date }}</td>
                                <td>
                                    @if ($peminjam->foto_bukti)
                                        <img src="{{ asset('bukti_pengembalian/' . $peminjam->foto_bukti) }}" alt="Bukti Pengembalian" class="img-thumbnail" width="100">
                                    @else
                                        <span class="no-photo">Belum ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $peminjam->denda > 0 ? 'Rp ' . number_format($peminjam->denda, 0, ',', '.') : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
