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
    @include('navigasi.sidebar')

    <div class="main-content">
        {{-- Navbar --}}
        @include('navigasi.navbar')

        <div class="content-area">
            <div class="container-custom">
                <h2 class="text-black fw-bold">Daftar Alat yang Sedang Dipinjam</h2>

                <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered">
                        <thead>
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
    </div>
</body>
</html>
