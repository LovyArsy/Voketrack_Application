
@include('navigasi.navbars') <!-- Navbar tetap di atas -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            height: 100vh;
            backdrop-filter: blur(5px);
        }

        .container-custom {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 70px; /* Hindari navbar tertutup */
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

        .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover, 
        .btn-warning:hover {
            transform: scale(1.05);
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding: 20px;
                max-width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <h2 class="text-black text-center">Daftar Alat yang Dipinjam oleh {{ $peminjams->first()->peminjam->name }}</h2>

        <div class="text-center my-3">
            <a href="/scans" class="btn btn-primary">Pinjam Barang</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Maximal Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjams as $index => $peminjam)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $peminjam->id }}</td>
                        <td>{{ $peminjam->barang->nama }}</td>
                        <td>{{ $peminjam->pinjam_date }}</td>
                        <td>{{ $peminjam->kembali_date }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('peminjamsiswa.edit', $peminjam->id) }}" class="btn btn-warning">Kembalikan Barang</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
