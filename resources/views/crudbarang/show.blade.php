
@include('navigasi.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang - VokeTrack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 100px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #17a2b8, #007bff);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .img-fluid {
            max-width: 80%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Barang
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $barang->nama }}</h5>
            <p class="card-text"><strong>Kode:</strong> {{ $barang->kode }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $barang->stok }}</p>
            
            <h5>QR Code:</h5>
            <img src="{{ asset('qrcodes/' . $barang->kode . '.png') }}" alt="QR Code {{ $barang->nama }}" class="img-fluid">
            
            <h5 class="mt-3">Gambar Barang:</h5>
            <img src="{{ asset('barangs/' . $barang->image) }}" alt="Gambar Barang" class="img-fluid">
            
            <div class="btn-group">
                <a href="{{ asset('qrcodes/' . $barang->kode . '.png') }}" download class="btn btn-primary">
                    Download QR Code
                </a>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
