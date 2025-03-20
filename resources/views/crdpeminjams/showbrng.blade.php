
@include('navigasi.navbars')

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
            margin-top: 100px;
            max-width: 600px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #007bff, #10a7f2);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }
        .card-body {
            padding: 20px;
        }
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .alert {
            margin-top: 10px;
        }
        .btn-pinjam {
            display: flex;
            justify-content: center;
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
            <h5 class="card-title text-center">{{ $barang->nama }}</h5>
            <p><strong>Kode:</strong> {{ $barang->kode }}</p>
            <p><strong>Stok:</strong> {{ $barang->stok }}</p>

            

            <h5>Gambar Barang:</h5>
            <div class="img-container">
                <img src="{{ asset('barangs/' . $barang->image) }}" alt="Gambar Barang">
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="btn-pinjam">
                <form action="/crdpeminjams/store" method="POST">
                    @csrf
                    <input type="hidden" name="peminjam_id" value="{{ session('peminjam_id') }}">
                    <input type="hidden" name="peminjam_type" value="{{ session('peminjam_type') }}">
                    <input type="hidden" name="barang_id" value="{{ $barang->id }}">

                    <button type="submit" class="btn btn-success btn-lg w-100">Pinjam Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
