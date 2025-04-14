
@include('navigasi.navbar') <!-- Navbar tetap di atas -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang Dikembalikan - VokeTrack</title>
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
            padding-top: 80px; /* Hindari navbar ketumpuk */
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
            .container-custom {
                padding: 20px;
                max-width: 95%;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>
