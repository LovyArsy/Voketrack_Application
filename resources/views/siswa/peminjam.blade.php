
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
            display: flex;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .main-content {
            width: calc(100% - 250px);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .content-area {
            flex: 1;
            overflow-y: auto;
            padding: 25px;
            backdrop-filter: blur(5px);
        }

        .container-custom {
            background: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(20px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .table th {
            color: white;
            background: rgba(0, 0, 0, 0.7);
        }

        .table td {
            color: #000;
            vertical-align: middle;
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
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .container-custom {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    {{-- Sidebar --}}
    @include('navigasi.sidebars')

    <div class="main-content">
        {{-- Navbar --}}
        @include('navigasi.navbar')

        <div class="content-area">
            <div class="container-custom">
                <h2 class="text-black fw-bold mb-4">
                    Daftar Alat yang Dipinjam oleh Siswa {{ $peminjams->first()->peminjam->name }}
                </h2>

                

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Barang</th>
                                <th>Jumlah Dipinjam</th>
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
                                <td>{{ $peminjam->jumlah }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjam->pinjam_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjam->kembali_date)->format('d-m-Y') }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('peminjamsiswa.edit', $peminjam->id) }}" class="btn btn-warning">
                                        Kembalikan Barang
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
