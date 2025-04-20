
@include('navigasi.navbar') <!-- Navbar agar tetap seragam -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembalikan Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            /* height: 100vh; */
            margin-top: 40%
            backdrop-filter: blur(5px);
            flex-direction: column;
        }

        .container-custom {
            /* min-height: 100vh; */
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .alert {
            margin-top: 10px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container-custom {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container-custom">
    <div class="form-container">
        <h2 class="text-center text-white">Kembalikan Barang</h2>

        <form action="{{ route('peminjamsiswa.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="{{ $peminjaman->barang->nama }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="text" class="form-control" value="{{ $peminjaman->pinjam_date }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Yang Dipinjam</label>
                <input type="text" class="form-control" value="{{ $peminjaman->jumlah }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Foto Bukti</label>
                <input type="file" class="form-control" name="foto_bukti" required>
            </div>

            <button type="submit" class="btn-primary">Kembalikan Barang</button>
        </form>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

</body>
</html>
