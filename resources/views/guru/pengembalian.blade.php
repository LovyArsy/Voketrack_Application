<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Dikembalikan - VokeTrack</title>
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

        .img-preview {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .no-image {
            font-style: italic;
            color: red;
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
                <h2 class="text-black fw-bold mb-4">
                    Barang yang Telah Dikembalikan oleh Guru {{ $peminjams->first()->peminjam->name }}
                </h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Dipinjam</th>
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
                                <td>{{ $peminjam->jumlah }}</td>
                                <td>{{ $peminjam->pinjam_date }}</td>
                                <td>{{ $peminjam->kembali_date }}</td>
                                <td>{{ $peminjam->kembalinya_date }}</td>
                                <td>
                                    @if ($peminjam->foto_bukti)
                                        <img src="{{ asset('bukti_pengembalian/' . $peminjam->foto_bukti) }}" alt="Bukti Pengembalian" class="img-preview">
                                    @else
                                        <span class="no-image">Belum ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $peminjam->denda > 0 ? 'Rp ' . number_format($peminjam->denda, 0, ',', '.') : 'Rp.0' }}
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
